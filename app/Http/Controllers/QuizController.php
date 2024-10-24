<?php

namespace App\Http\Controllers;

use App\Repositories\LessonRepository;
use App\Repositories\QuizRepository;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    protected $quizRepo;
    protected $lessonRepo;

    public function __construct(QuizRepository $quizRepo, LessonRepository $lessonRepo)
    {
        $this->quizRepo = $quizRepo;
        $this->lessonRepo = $lessonRepo;
    }

    public function store(Request $request)
    {
//        return $request;
        $validated = $request->validate([
            'quiz_text' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // Validate image file
            'a_answer' => 'required|string',
            'b_answer' => 'required|string',
            'c_answer' => 'required|string',
            'd_answer' => 'required|string',
            'lesson_id' => 'required|exists:lessons,id'
        ]);

        // Pass the uploaded file (if any) to the repository
        $this->quizRepo->addQuiz(
            $validated['quiz_text'],
            $request->file('photo'),
            $validated['a_answer'],
            $validated['b_answer'],
            $validated['c_answer'],
            $validated['d_answer'],
            $validated['lesson_id']
        );

        return redirect()->back()->with('success',"Test qo'shildi");
    }

    public function index($lesson_id)
    {
        $quizzes = $this->quizRepo->lessonQuizzes($lesson_id);
        $lesson = $this->lessonRepo->getLesson($lesson_id);
        return view('admin.lesson_quizzes', ['quizzes' => $quizzes, 'lesson' => $lesson]);
    }

    public function destroy($id, Request $request)
    {
        $lesson_id = $request->input('lesson_id');

        $this->quizRepo->deleteQuiz($id, $lesson_id);

        return redirect()->back()->with('success', "Test o'chirildi");
    }

}
