<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name_en', 'name_fr', 'slug', 'icon'];
    
    public function flashcards()
    {
        return $this->hasMany(Flashcard::class);
    }
    
    public function getName($locale = 'en')
    {
        return $this->{"name_$locale"};
    }
}
