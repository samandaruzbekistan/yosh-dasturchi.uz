<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'photo', 'description'];
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'section_id');
    }
}
