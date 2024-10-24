<?php

namespace App\Repositories;

use App\Models\Answer;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\QuizResult;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class QuizRepository
{
    protected function updateQuizCount($lesson_id, $increment = true)
    {
        $lesson = Lesson::find($lesson_id);
        $lesson->increment('quiz_count', $increment ? 1 : -1);
    }

    protected function updateQuizCountDecrement($lesson_id)
    {
        $lesson = Lesson::find($lesson_id);
        $lesson->increment('quiz_count', -1);
    }

    public function addQuiz($quiz_text, $photo, $a_answer, $b_answer, $c_answer, $d_answer, $lesson_id)
    {
        // Save image with a new generated name if it exists
        $photoPath = "no_photo";
        if ($photo) {
            $generatedName = Str::uuid() . '.' . $photo->getClientOriginalExtension();  // Generate unique file name
            $photoPath = $photo->storeAs('quiz_photos', $generatedName, 'public');
        }

        $quiz = Quiz::create([
            'lesson_id' => $lesson_id,
            'quiz' => $quiz_text,
            'photo' => $photoPath
        ]);

        $this->createAnswer($quiz->id, $a_answer, true);  // Correct answer
        $this->createAnswer($quiz->id, $b_answer);
        $this->createAnswer($quiz->id, $c_answer);
        $this->createAnswer($quiz->id, $d_answer);

        $this->updateQuizCount($lesson_id);
    }

    protected function createAnswer($quiz_id, $answer_text, $is_correct = false)
    {
        Answer::create([
            'quiz_id' => $quiz_id,
            'answer' => $answer_text,
            'is_correct' => $is_correct
        ]);
    }

    public function lessonQuizzes($lesson_id)
    {
        return Quiz::with('answers')->where('lesson_id', $lesson_id)->get();
    }

    public function getQuiz($id)
    {
        return Quiz::find($id);
    }

    public function deleteQuiz($id, $lesson_id)
    {
        $quiz = Quiz::find($id);

        // Delete photo from storage
        if ($quiz && $quiz->photo) {
            Storage::disk('public')->delete($quiz->photo);
        }

        Answer::where('quiz_id', $id)->delete();
        $quiz->delete();

        $this->updateQuizCountDecrement($lesson_id);
    }

    public function storeResult($user_id, $lesson_id, $percent){
        $result = new QuizResult;
        $result->user_id = $user_id;
        $result->lesson_id = $lesson_id;
        $result->percent = $percent;
        $result->save();
    }

    public function getResult($user_id, $lesson_id){
        return QuizResult::where('user_id', $user_id)->where('lesson_id', $lesson_id)->first();
    }

    public function getLessonResults($lesson_id){
        return QuizResult::with('user')->where('lesson_id', $lesson_id)->paginate(100);
    }
}
