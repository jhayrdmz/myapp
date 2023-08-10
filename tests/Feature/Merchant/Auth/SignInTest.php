<?php

namespace Tests\Feature\Merchant\Auth;

use App\Models\Merchant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SignInTest extends TestCase
{
    use RefreshDatabase;

    public function test_merchants_can_authenticate_using_the_login_screen(): void
    {
        $merchant = Merchant::factory()->create();

        $response = $this->post(route('merchant.auth.signin'), [
            'email' => $merchant->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertNoContent();
    }
}
