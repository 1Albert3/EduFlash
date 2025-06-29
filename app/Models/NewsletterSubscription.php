<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    protected $fillable = ['email', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];
    public $timestamps = false;
    
    protected $dates = ['subscribed_at', 'unsubscribed_at'];
}
