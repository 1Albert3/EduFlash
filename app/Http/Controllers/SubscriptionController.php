<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
    }

    public function index()
    {
        $user = auth()->user();
        $plans = [
            'monthly' => ['price' => 9.99, 'duration' => 1],
            'yearly' => ['price' => 99.99, 'duration' => 12, 'discount' => 17],
        ];
        
        return view('subscription.index', compact('user', 'plans'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'plan' => 'required|in:monthly,yearly',
            'payment_method' => 'required|in:stripe,paypal,bank_transfer',
        ]);

        $plans = [
            'monthly' => ['price' => 9.99, 'duration' => 1],
            'yearly' => ['price' => 99.99, 'duration' => 12],
        ];

        $plan = $plans[$request->plan];
        
        $payment = Payment::create([
            'user_id' => auth()->id(),
            'payment_id' => 'PAY_' . Str::upper(Str::random(10)),
            'payment_method' => $request->payment_method,
            'amount' => $plan['price'],
            'currency' => 'EUR',
            'subscription_type' => 'premium',
            'duration_months' => $plan['duration'],
            'status' => 'pending',
        ]);

        return redirect()->route('subscription.payment', $payment);
    }

    public function payment(Payment $payment)
    {
        if ($payment->user_id !== auth()->id()) {
            abort(403);
        }

        return view('subscription.payment', compact('payment'));
    }

    public function success(Payment $payment)
    {
        if ($payment->user_id !== auth()->id()) {
            abort(403);
        }

        // Simulate payment success
        $payment->update(['status' => 'completed']);
        
        $user = auth()->user();
        $expiresAt = $user->subscription_expires_at ?? now();
        if ($expiresAt->isPast()) {
            $expiresAt = now();
        }
        
        $user->update([
            'subscription_type' => 'premium',
            'subscription_expires_at' => $expiresAt->addMonths($payment->duration_months),
        ]);

        return redirect()->route('subscription.index')->with('success', 'Abonnement Premium activé avec succès !');
    }
}