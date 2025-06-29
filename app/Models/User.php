<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'subscription_type',
        'subscription_expires_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'subscription_expires_at' => 'datetime',
        ];
    }
    
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    
    public function isEditor()
    {
        return in_array($this->role, ['admin', 'editor']);
    }
    
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    
    public function favoriteFlashcards()
    {
        return $this->belongsToMany(Flashcard::class, 'favorites');
    }
    
    public function hasFavorited($flashcard)
    {
        if (!$flashcard || !$flashcard->id) return false;
        return $this->favorites()->where('flashcard_id', $flashcard->id)->exists();
    }
    
    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmailNotification);
    }
    
    public function isPremium()
    {
        return $this->subscription_type === 'premium' && 
               $this->subscription_expires_at && 
               $this->subscription_expires_at->isFuture();
    }
}
