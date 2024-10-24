<?php

namespace App\Http\Controllers;

use App\Models\LearnStory;
use App\Repositories\LearnStoryRepository;
use App\Repositories\LessonRepository;
use App\Repositories\QuizRepository;
use App\Repositories\SectionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LessonController extends Controller
{
    protected $lessonRepo;
    protected $sectionRepo;
    protected $learnStoryRepo;
    protected $quizRepo;

    public function __construct(LessonRepository $lessonRepo, SectionRepository $sectionRepo, LearnStoryRepository $learnStoryRepo, QuizRepository $quizRepo)
    {
        $this->lessonRepo = $lessonRepo;
        $this->sectionRepo = $sectionRepo;
        $this->learnStoryRepo = $learnStoryRepo;
        $this->quizRepo = $quizRepo;
    }

    // List all lessons or filter by section
    public function index($section_id)
    {
        $lessons = $this->lessonRepo->getLessons($section_id)->get();
        $section = $this->sectionRepo->getSection($section_id);
        return view('admin.lessons', ['data' => $lessons, 'section' => $section]);
    }

    // Show a single lesson
    public function show($id)
    {
        $lesson = $this->lessonRepo->getLesson($id);
        if (!$lesson) {
            abort(404, 'Page not found');
        }
        $quizzes = $this->quizRepo->lessonQuizzes($id);
        $result = null;
        $story = $this->learnStoryRepo->getStory(session('user_id'), $lesson->section_id);
        if(session()->has('user')){
            $result = $this->quizRepo->getResult(session('user_id'), $id);
            if(!$story){
                $this->learnStoryRepo->addStory(session('user_id'), $lesson->section_id, $id);
            }
            else if($story->lesson_id < $id){
                $new_lessons_count = $story->lessons_count + 1;
                $this->learnStoryRepo->update($story->id, $id, $new_lessons_count);
            }
        }
        $nextLesson = null;
        $previousLesson = null;
        $nextLesson = $this->lessonRepo->getNextLesson($id, $lesson->section_id);
        $previousLesson = $this->lessonRepo->getPreviousLesson($id,$lesson->section_id);
        return view('user.lesson', ['quizzes' => $quizzes,'lesson' => $lesson, 'nextLesson' => $nextLesson,'previousLesson' => $previousLesson, 'next_lesson' => $nextLesson, 'result' => $result]);
    }

    // Edit a single lesson
    public function edit_form($id)
    {
        $lesson = $this->lessonRepo->getLesson($id);
        if (!$lesson) {
//            return redirect()->back()->with('Lesson not found');
        }
        return view('admin.lesson_edit', ['lesson' => $lesson]);
    }

    // Store a new lesson
    public function store(Request $request)
    {
//        return $request;
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'body' => 'required|string',
            'section_id' => 'required|integer|exists:sections,id',
            'video_url' => 'nullable|string',
            'switch_editor' => 'string',
        ]);

        $lesson = $this->lessonRepo->addLesson(
            $data['name'],
            $data['body'],
            $data['section_id'],
            $data['video_url'] ?? 'no_video',
            $data['switch_editor'] ?? "off"
        );

        $this->sectionRepo->incrementLessonCount($data['section_id']);

        return redirect()->back()->with('success', 'Dars yuklandi');
    }

    // Delete a lesson
    public function delete($lesson_id)
    {
        try {
            // Call the repository to delete the lesson
            $this->lessonRepo->deleteLesson($lesson_id);

            // Return a success message or redirect
            return redirect()->back()->with('success',"Dars o'chirildi");
        } catch (\Exception $e) {
            // Handle errors (lesson not found, etc.)
            return redirect()->back()->with('error',"Dars o'chirilmadi");
        }
    }

    // Update an existing lesson
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'body' => 'nullable|string',
            'video_url' => 'nullable|string',
        ]);

        $updated = $this->lessonRepo->updateLesson($id, $data);

        if (!$updated) {
            return redirect()->route('admin.lessons', ['section_id' => $request->section_id])->with('error',"Lesson not found or no changes made");
        }
        return redirect()->route('admin.lessons', ['section_id' => $request->section_id])->with('success',"Lesson updated successfully");
    }


    // Search lessons
    public function search(Request $request)
    {
        $query = $request->get('q');
        $lessons = $this->lessonRepo->searchLessons($query)->get();

        return response()->json($lessons);
    }

    // Count all lessons
    public function count()
    {
        $count = $this->lessonRepo->countLessons();
        return response()->json(['count' => $count]);
    }

    public function check(Request $request){
        $correct = 0;
        $incorrect = 0;
        $r = [];
        for ($x = 1; $x <= $request->quiz_count; $x++) {
            $index = 'answer'.$x;
            if (isset($request->$index)){
                if ($request[$index] == '1'){
                    $correct = $correct+1;
                }
                else{
                    $incorrect = $incorrect+1;
                }
            }
        }
        $percent = $request->quiz_count / 100;
        $percent = $correct / $percent;
        $this->quizRepo->storeResult(session('user_id'), $request->lesson_id, $percent);
        session()->flash('result',1);
        session()->flash('correct',$correct);
        session()->flash('incorrect',$incorrect);
        session()->flash('percent',$percent);
        return redirect()->back();
    }

    public function quiz_results($id){
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|integer|min:1|exists:sections,id',
        ]);
        if ($validator->fails()) {
            abort(404, 'Page not found');
        }
        $stories = $this->quizRepo->getLessonResults($id);
        return view('admin.quiz_results', ['results' => $stories]);
    }
}
