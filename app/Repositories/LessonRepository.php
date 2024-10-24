<?php

namespace App\Repositories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class LessonRepository
{
    public function addLesson(string $name, string $body, int $sectionId, string $video, string $switchEditor): Lesson
    {
        return Lesson::create([
        'name' => $name,
        'body' => $body,
        'section_id' => $sectionId,
        'video_url' => $video,
        'switch_editor' => $switchEditor,
        ]);
    }

    public function getLessons(int $sectionId = null): Builder
    {
        $query = Lesson::query();

        if ($sectionId) {
            $query->where('section_id', $sectionId);
        }

        return $query;
    }

    public function getLesson($id): ?Lesson
    {
        return Lesson::find($id);
    }

    public function updateLesson(int $id, array $data): bool
    {
        $lesson = Lesson::find($id);

        if (!$lesson) {
            return false; // Lesson not found
        }

        return $lesson->update($data);
    }

    public function searchLessons(string $query): Builder
    {
        return Lesson::where('name', 'like', "%$query%")->orWhere('body', 'like', "%$query%");
    }

    public function countLessons(): int
    {
        return Lesson::count();
    }

    // Function to delete a lesson, including its images, quizzes, and answers
    public function deleteLesson($lesson_id)
    {
        // Find the lesson by ID
        $lesson = Lesson::with('quizzes.answers')->find($lesson_id);

        if (!$lesson) {
            throw new \Exception("Lesson not found.");
        }

        // Delete associated image if exists
        if ($lesson->photo && Storage::exists($lesson->photo)) {
            Storage::delete($lesson->photo);
        }

        // Delete quizzes and their answers
        foreach ($lesson->quizzes as $quiz) {
            // Delete quiz answers
            $quiz->answers()->delete();
            // Delete the quiz
            $quiz->delete();
        }

        // Delete the lesson
        $lesson->delete();
    }

    public function getNextLesson($id,$sectionId){
        return Lesson::where('id', '>', $id)->where('section_id', $sectionId)->orderBy('id')->first();
    }

    public function getPreviousLesson($currentLessonId, $sectionId)
    {
        return Lesson::where('id', '<', $currentLessonId)
            ->where('section_id', $sectionId)
            ->orderBy('id', 'desc') // Order by ID in descending to get the closest smaller ID
            ->first();
    }
}
