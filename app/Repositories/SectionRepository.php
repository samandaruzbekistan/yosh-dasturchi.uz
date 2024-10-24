<?php

namespace App\Repositories;

use App\Models\Section;
use Illuminate\Support\Facades\DB;

class SectionRepository
{
    // Add a new section
    public function addSection(string $name, string $description, string $photo): Section
    {
        return Section::create([
            'name' => $name,
            'description' => $description,
            'photo' => $photo,
        ]);
    }

    // Increment the lesson count for a section
    public function incrementLessonCount(int $sectionId): bool
    {
        return Section::where('id', $sectionId)
            ->increment('lessons_count', 1);
    }

    // Decrement the lesson count for a section (e.g., when a lesson is deleted)
    public function decrementLessonCount(int $sectionId): bool
    {
        return Section::where('id', $sectionId)
            ->decrement('lessons_count', 1);
    }

    // Find a section by ID
    public function getSection(int $id): ?Section
    {
        return Section::find($id);
    }

    // Delete a section
    public function deleteSection(int $id): bool
    {
        $section = Section::find($id);

        if (!$section) {
            return false;
        }

        return $section->delete();
    }

    // List all sections
    public function getAllSections()
    {
        return Section::all();
    }

    // Search for sections by name
    public function searchSections(string $query)
    {
        return Section::where('name', 'like', "%$query%")->get();
    }

    // Count all sections
    public function countSections(): int
    {
        return Section::count();
    }
}
