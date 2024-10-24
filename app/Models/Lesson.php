<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'body', 'section_id', 'video_url', 'switch_editor'];

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
