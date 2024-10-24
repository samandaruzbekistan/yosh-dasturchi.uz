<?php

namespace App\Repositories;

use App\Models\LearnStory;

class LearnStoryRepository
{
    public function getStory($user_id, $section_id){
        return LearnStory::where('user_id', $user_id)->where('section_id', $section_id)->first();
    }

    public function getUserStories($user_id){
        return LearnStory::where('user_id', $user_id)->get();
    }

    public function addStory($user_id, $section_id, $lesson_id){
        $story = new LearnStory;
        $story->user_id = $user_id;
        $story->section_id = $section_id;
        $story->lesson_id = $lesson_id;
        $story->lessons_count = 1;
        $story->save();
    }

    public function update($id, $lesson_id, $new_count){
        LearnStory::where('id', $id)->update([
            'lesson_id' => $lesson_id,
            'lessons_count' => $new_count
        ]);
    }

    public function getSectionStories($section_id){
        return LearnStory::where('section_id', $section_id)->paginate(100);
    }
}
