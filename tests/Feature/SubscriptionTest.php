<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_subscription_page()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        
        $response = $this->actingAs($user)->get('/premium');
        
        $response->assertStatus(200);
        $response->assertSee('Premium');
    }

    public function test_user_can_checkout_monthly_plan()
    {
        $user = User::factory()->create(['email_verified_at' => now()]);
        
        $response = $this->actingAs($user)->post('/premium/checkout', [
            'plan' => 'monthly',
            'payment_method' => 'stripe'
        ]);
        
        $response->assertRedirect();
        $this->assertDatabaseHas('payments', [
            'user_id' => $user->id,
            'amount' => 9.99,
            'duration_months' => 1
        ]);
    }

    public function test_successful_payment_activates_premium()
    {
        $user = User::factory()->create();
        $payment = Payment::factory()->create([
            'user_id' => $user->id,
            'status' => 'pending',
            'duration_months' => 1
        ]);
        
        $response = $this->actingAs($user)->post("/premium/success/{$payment->id}");
        
        $user->refresh();
        $this->assertEquals('premium', $user->subscription_type);
        $this->assertTrue($user->isPremium());
    }
}