<?php

namespace Tests\Feature\Users;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     *@test
     */
    public function an_existing_users_name_and_email_may_be_updated()
    {
        $this->disableExceptionHandling();
        $user = factory(User::class)->create(['name' => 'Old Name', 'email' => 'old@email.test']);

        $response = $this->asLoggedInUser()->json("POST", "/admin/users/{$user->id}", [
            'name' => 'New Name',
            'email' => 'new@email.test'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'New Name',
            'email' => 'new@email.test'
        ]);
    }

    /**
     *@test
     */
    public function the_name_filed_is_required()
    {
        $this->assertValidationError(['name' => '']);
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
    public function the_email_must_be_a_valid_email_address()
    {
        $this->assertValidationError(['email' => 'not_a_valid_email_address']);
    }

    private function assertValidationError($field)
    {
        $user = factory(User::class)->create();
        $defaults = [
            'name'                  => 'Test Person',
            'email'                 => 'person@test.test',
        ];
        $response = $this->asLoggedInUser()->json("POST", "/admin/users/{$user->id}", array_merge($defaults, $field));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(array_keys($field)[0]);
    }
}