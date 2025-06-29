<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['flashcard_id', 'questions'];
    protected $casts = ['questions' => 'array'];

    public function flashcard()
    {
        return $this->belongsTo(Flashcard::class);
    }

    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}