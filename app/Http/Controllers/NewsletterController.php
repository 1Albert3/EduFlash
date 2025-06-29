<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscription;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        
        try {
            NewsletterSubscription::create(['email' => $request->email]);
            return back()->with('success', __('newsletter_success'));
        } catch (\Exception $e) {
            return back()->with('error', __('newsletter_exists'));
        }
    }
    
    public function unsubscribe($email)
    {
        NewsletterSubscription::where('email', $email)->update([
            'is_active' => false,
            'unsubscribed_at' => now()
        ]);
        
        return view('newsletter.unsubscribed');
    }
}
