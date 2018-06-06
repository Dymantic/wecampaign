<?php

namespace Tests\Feature\ContactMessages;

use App\Mail\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SendContactMessageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_contact_message_is_sent_to_the_set_emails_in_config()
    {
        $this->disableExceptionHandling();
        Mail::fake();
        config()->set('contact-messages.recipients', [
            'admin_one@test.test',
            'admin_two@test.test',
            'admin_three@test.test'
        ]);

        $response = $this->asGuest()->json("POST", "/contact", [
            'name'         => 'Test Name',
            'email'        => 'test@test.test',
            'phone_number' => '0123456789',
            'message_text'      => 'Test Message'
        ]);

        $response->assertStatus(200);

        collect(config('contact-messages.recipients'))->each(function ($recipient) {
            Mail::assertSent(ContactMessage::class, function ($mail) use ($recipient) {
                return $mail->hasTo($recipient) &&
                    $mail->message_text === 'Test Message' &&
                    $mail->phone_number === '0123456789' &&
                    $mail->sender === 'Test Name';
            });
        });
    }

    /**
     *@test
     */
    public function the_name_is_required()
    {
        $this->assertFieldIsInvalid(['name' => '']);
    }

    /**
     *@test
     */
    public function the_email_is_required()
    {
        $this->assertFieldIsInvalid(['email' => '']);
    }

    /**
     *@test
     */
    public function the_email_must_be_a_valid_email_address()
    {
        $this->assertFieldIsInvalid(['email' => 'not-a-valid-address']);
    }

    /**
     *@test
     */
    public function the_message_text_is_required()
    {
        $this->assertFieldIsInvalid(['message_text' => '']);
    }

    private function assertFieldIsInvalid($field)
    {
        Mail::fake();

        $validFields = [
            'name'         => 'Test Name',
            'email'        => 'test@test.test',
            'phone_number' => '0123456789',
            'message_text'      => 'Test Message'
        ];

        $response = $this->asGuest()->json("POST", "/contact", array_merge($validFields, $field));

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(array_keys($field)[0]);

        Mail::assertNotSent(ContactMessage::class);
    }
}