<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['quiz_id', 'answer', 'is_correct'];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
