<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    protected $fillable = [
        'category_id', 'title_en', 'title_fr', 'summary_en', 'summary_fr',
        'content_en', 'content_fr', 'keywords_en', 'keywords_fr', 'slug',
        'is_featured', 'is_published'
    ];
    
    protected $casts = [
        'is_featured' => 'boolean',
        'is_published' => 'boolean'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    public function getTitle($locale = 'en')
    {
        return $this->{"title_$locale"};
    }
    
    public function getSummary($locale = 'en')
    {
        return $this->{"summary_$locale"};
    }
    
    public function getContent($locale = 'en')
    {
        return $this->{"content_$locale"};
    }
    
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
    
    public function scopeSearch($query, $term, $locale = 'en')
    {
        return $query->whereFullText([
            "title_$locale", "summary_$locale", "content_$locale", "keywords_$locale"
        ], $term);
    }
    
    public function incrementViews()
    {
        $this->increment('views_count');
    }
}
