<?php

namespace App\Http\Controllers;

use App\Repositories\DistrictRepository;
use App\Repositories\LearnStoryRepository;
use App\Repositories\SectionRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct(
        protected DistrictRepository $districtRepository,
        protected UserRepository $userRepository,
        protected SectionRepository $sectionRepository,
        protected LearnStoryRepository $learnStoryRepository
    )
    {
    }

    public function index(){
        $sections = $this->sectionRepository->getAllSections();
        return view('user.index', ['sections' => $sections]);
    }

    // Registration Method
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password2' => 'required|string|min:8',
            'school' => 'required|string|max:255',
            'region_id' => 'required|exists:regions,id',
            'district_id' => 'required|exists:districts,id',
            'quarter_id' => 'required|exists:quarters,id',
        ]);
        $user = $this->userRepository->getUser($request->email);
        if($user){
            return redirect()->back()->with('username_error',1);
        }
        if ($request->password != $request->password2){
            return redirect()->back()->with('password_error',1);
        }

        $data = $request->only([
            'username', 'email', 'password', 'school', 'class_name',
            'region_id', 'district_id', 'quarter_id', 'is_teacher'
        ]);

        // Create the user
        $user = $this->userRepository->createUser($data);
        session()->put('user_id', $user->id);
        session()->put('user_name', $user->name);
        session()->put('user_email', $user->email);
        session()->put('user', 1);
        return redirect()->route('user.index');
    }

    // Authentication Method
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Authenticate the user
        $user = $this->userRepository->authenticateUser($email, $password);

        if ($user) {
            session()->put('user_id', $user->id);
            session()->put('user', 1);
            session()->put('user_name', $user->name);
            session()->put('user_email', $user->email);
            return redirect()->route('user.index');
        }

        return redirect()->back()->with('login_error',1);
    }

    // Logout Method
    public function logout()
    {
        session()->flush();
        return redirect()->route('user.login');
    }

    public function profile(){
        $user = $this->userRepository->getUser(session('user_email'));
        return view('user.profile', ['user' => $user]);
    }

    //    Region control
    public function districts($region_id){
        return $this->districtRepository->districts($region_id);
    }

    public function quarters($district_id){
        return $this->districtRepository->quarters($district_id);
    }

    public function users(){
        $users = $this->userRepository->users();
        return view('admin.users', ['users' => $users]);
    }

    public function user_profile($id){
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|min:1|exists:users,id',
        ]);
        if ($validator->fails()) {
            abort(404, 'Page not found');
        }
        $student = $this->userRepository->getUserById($id);
        $stories = $this->learnStoryRepository->getUserStories($id);
        return view('admin.student', ['student' => $student, 'stories' => $stories]);
    }

}
