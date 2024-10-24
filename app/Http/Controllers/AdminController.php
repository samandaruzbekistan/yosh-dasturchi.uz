<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //    Auth admin
    public function auth(Request $request){
        $request->validate([
            'username' => "required|string",
            'password' => "required|string",
        ]);
        $admin = Admin::where('username', $request->username)->first();
        if (!empty($admin)){
            if (Hash::check($request->password, $admin->password)){
                session()->put('admin',1);
                session()->put('id',$admin->id);
                session()->put('name',$admin->name);
                return redirect()->route('admin.home');
            }
            else{
                return back()->with("login_error",1);
            }
        }
        else{
            return back()->with("login_error",1);
        }
    }

    public function logout(){
        session()->flush();
        return redirect()->route('admin.login');
    }

    public function profile(){

    }

    public function update_password(Request $request){
        if ($request->password1 != $request->password2){
            return back()->with('error',"Parollar bir xil emas");
        }
        else{
            $admin = Admin::find(session('id'));
            $admin->password = Hash::make($request->password1);
            $admin->save();
            return back()->with('success',"Parolingiz yangilandi");
        }
    }
}
