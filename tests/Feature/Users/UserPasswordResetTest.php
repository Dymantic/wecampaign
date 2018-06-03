<?php


namespace Tests\Feature\Users;


use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UserPasswordResetTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function a_logged_in_user_may_reset_their_password()
    {
        $this->disableExceptionHandling();
        $user = factory(User::class)->create(); //default password is 'secret'

        $response = $this->actingAs($user)->post("/admin/reset-password", [
            'current_password' => 'secret',
            'password' => 'new_password',
            'password_confirmation' => 'new_password'
        ]);
        $response->assertStatus(200);

        $this->assertTrue(Hash::check('new_password', $user->fresh()->password));
    }

    /**
     *@test
     */
    public function the_current_password_must_match_the_logged_in_users_password()
    {
        $user = factory(User::class)->create(); //default password is 'secret'

        $response = $this->actingAs($user)->post("/admin/reset-password", [
            'current_password' => 'INCORRECT_PASSWORD',
            'password' => 'new_password',
            'password_confirmation' => 'new_password'
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('current_password');

        $this->assertTrue(Hash::check('secret', $user->fresh()->password));
    }

    /**
     *@test
     */
    public function the_password_must_be_at_least_six_characters_in_length()
    {
        $user = factory(User::class)->create(); //default password is 'secret'

        $response = $this->actingAs($user)->post("/admin/reset-password", [
            'current_password' => 'secret',
            'password' => '12345',
            'password_confirmation' => '12345'
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');

        $this->assertTrue(Hash::check('secret', $user->fresh()->password));
    }

    /**
     *@test
     */
    public function the_password_is_required()
    {
        $user = factory(User::class)->create(); //default password is 'secret'

        $response = $this->actingAs($user)->post("/admin/reset-password", [
            'current_password' => 'secret',
            'password' => '',
            'password_confirmation' => ''
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');

        $this->assertTrue(Hash::check('secret', $user->fresh()->password));
    }

    /**
     *@test
     */
    public function the_password_must_be_confirmed()
    {
        $user = factory(User::class)->create(); //default password is 'secret'

        $response = $this->actingAs($user)->post("/admin/reset-password", [
            'current_password' => 'secret',
            'password' => 'new_password',
            'password_confirmation' => 'NOT_MATCHING_CONFIRMATION'
        ]);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('password');

        $this->assertTrue(Hash::check('secret', $user->fresh()->password));
    }
}