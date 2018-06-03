<?php

namespace Tests\Feature\Users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function a_registered_user_can_register_another_user()
    {
        $this->disableExceptionHandling();
        $response = $this->asLoggedInUser()->json("POST", "/admin/users", [
            'name'                  => 'Testy Person',
            'email'                 => 'testy@person.test',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'name'                  => 'Testy Person',
            'email'                 => 'testy@person.test',
        ]);
    }

    /**
     *@test
     */
    public function a_guest_cannot_register_users()
    {
        $response = $this->asGuest()->json("POST", "/admin/users", [
            'name'                  => 'Testy Person',
            'email'                 => 'testy@person.test',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(401);

        $this->assertDatabaseMissing('users', [
            'name'                  => 'Testy Person',
            'email'                 => 'testy@person.test',
        ]);
    }

    /**
     *@test
     */
    public function the_name_field_is_required()
    {
        $response = $this->asLoggedInUser()->json("POST", "/admin/users", [
            'name'                  => '',
            'email'                 => 'testy@person.test',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }

    /**
     *@test
     */
    public function the_email_is_required()
    {
        $this->assertValidationError(['email' => '']);
    }

    /**
     *@test
     */
    public function the_email_needs_to_be_a_valid_email_address()
    {
        $this->assertValidationError(['email' => 'not_a_valid_email_address']);
    }

    /**
     *@test
     */
    public function a_password_is_required()
    {
        $this->assertValidationError(['password' => '']);
    }

    /**
     *@test
     */
    public function the_password_must_be_confirmed()
    {
        $this->assertValidationError(['password' => 'something', 'password_confirmation' => 'something_else']);
    }

    /**
     *@test
     */
    public function the_password_must_be_at_least_six_characters()
    {
        $this->assertValidationError(['password' => '12345', 'password_confirmation' => '12345']);
    }

    private function assertValidationError($field)
    {
        $defaults = [
            'name'                  => 'Test Person',
            'email'                 => 'person@test.test',
            'password'              => 'password',
            'password_confirmation' => 'password'
        ];
        $response = $this->asLoggedInUser()->json("POST", "/admin/users", array_merge($defaults, $field));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(array_keys($field)[0]);
    }


}