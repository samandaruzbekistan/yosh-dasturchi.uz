<?php

namespace App\Http\Controllers;

use App\Repositories\LearnStoryRepository;
use App\Repositories\LessonRepository;
use App\Repositories\SectionRepository;
use App\Repositories\QuizRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SectionController extends Controller
{
    protected $sectionRepo;
    protected $lessonRepo;
    protected $learnStoryRepo;
    protected $quizRepo;

    public function __construct(SectionRepository $sectionRepo, LessonRepository $lessonRepo, LearnStoryRepository $learnStoryRepo, QuizRepository $quizRepo)
    {
        $this->sectionRepo = $sectionRepo;
        $this->lessonRepo = $lessonRepo;
        $this->learnStoryRepo = $learnStoryRepo;
        $this->quizRepo = $quizRepo;
    }

    public function view_section($id){
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|min:1|exists:sections,id',
        ]);
        if ($validator->fails()) {
            abort(404, 'Page not found');
        }
        $themes = $this->lessonRepo->getLessons($id)->get();
        $section = $this->sectionRepo->getSection($id);

        $data = [
            'themes' => $themes,
            'section' => $section,
            'story' => null,
        ];

        if (session('user_id')) {
            // Fetch the learning story for the user
            $story = $this->learnStoryRepo->getStory(session('user_id'), $section->id);

            // Add story data to the view if available
            if ($story) {
                $data['story'] = $story;
            }
        }
        return view('user.section', $data);
    }

    // List all sections
    public function index()
    {
        $sections = $this->sectionRepo->getAllSections();
        return view('admin.sections', ['data' => $sections]);
    }

    // Show a single section
    public function show($id)
    {
        $section = $this->sectionRepo->getSection($id);
        if (!$section) {
            return response()->json(['message' => 'Section not found'], 404);
        }
        return response()->json($section);
    }

    // Store a new section
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Generate a unique name for the image
            $image->move(public_path('images/sections'), $imageName);
            // $imagePath = $image->storeAs('sections/photos', $imageName, 'public'); // Store the image in 'storage/app/public/sections/photos'
            $imagePath = 'images/sections/' . $imageName;
            // Create the new section with the uploaded image path
            $section = $this->sectionRepo->addSection($data['name'],$data['description'], $imagePath);

            return redirect()->back()->with('success', 'Bo\'lim muvaffaqiyatli qo\'shildi.');
        }

        // Store error message in the session
        return redirect()->back()->with('error', 'Photo upload failed.');
    }

    // Delete a section
    public function destroy($id)
    {
        $deleted = $this->sectionRepo->deleteSection($id);

        if (!$deleted) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        return response()->json(['message' => 'Section deleted successfully']);
    }

    // Increment lesson count for a section
    public function incrementLessonCount($id)
    {
        $incremented = $this->sectionRepo->incrementLessonCount($id);

        if (!$incremented) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        return response()->json(['message' => 'Lesson count incremented successfully']);
    }

    // Decrement lesson count for a section
    public function decrementLessonCount($id)
    {
        $decremented = $this->sectionRepo->decrementLessonCount($id);

        if (!$decremented) {
            return response()->json(['message' => 'Section not found'], 404);
        }

        return response()->json(['message' => 'Lesson count decremented successfully']);
    }

    // Search sections
    public function search(Request $request)
    {
        $query = $request->get('q');
        $sections = $this->sectionRepo->searchSections($query);

        return response()->json($sections);
    }

    // Count all sections
    public function count()
    {
        $count = $this->sectionRepo->countSections();
        return response()->json(['count' => $count]);
    }

    public function section_students($id){
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|min:1|exists:sections,id',
        ]);
        if ($validator->fails()) {
            abort(404, 'Page not found');
        }
        $stories = $this->learnStoryRepo->getSectionStories($id);
        $section = $this->sectionRepo->getSection($id);
        $prosent = $section->lessons_count / 100;
        return view('admin.section_students', ['stories' => $stories, 'section' => $section, 'prosent' => $prosent]);
    }

    public function delete_section($id){
        $lessons = $this->lessonRepo->getLessons($id)->get();
        foreach ($lessons as $lesson) {
            $quizzes = $this->quizRepo->lessonQuizzes($lesson->id);
            foreach ($quizzes as $quiz) {
                $this->quizRepo->deleteQuiz($quiz->id, $lesson->id);
            }
            $this->quizRepo->deleteQuizResultByLessonId($lesson->id);
            $this->learnStoryRepo->deleteStoryByLessonId($lesson->id);
            $this->lessonRepo->deleteLesson($lesson->id);
        }
        // return redirect()->back()->with('success', 'Bo\'lim muvaffaqiyatli o\'chirildi.');

        $deleted = $this->sectionRepo->deleteSection($id);
        if (!$deleted) {
            return response()->json(['message' => 'Section not found'], 404);
        }
        return redirect()->back()->with('success', 'Bo\'lim muvaffaqiyatli o\'chirildi.');
    }
}
