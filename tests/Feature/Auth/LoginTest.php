<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     *@test
     */
    public function a_registered_user_may_log_in()
    {
        $user = factory(User::class)->create(); //password will be 'secret'

        $response = $this->post("/admin/login", [
            'email' => $user->email,
            'password' => 'secret'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect("/admin");

        $this->assertTrue(\Auth::check());
    }

    /**
     *@test
     */
    public function a_non_registered_user_may_not_log_in()
    {
        $response = $this->post("/admin/login", [
            'email' => 'nonuser@test.com',
            'password' => 'totally_fake_password'
        ]);
        $response->assertStatus(302);

        $this->assertFalse(\Auth::check());
    }
}