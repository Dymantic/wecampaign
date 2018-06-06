<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message_text;
    public $phone_number;
    public $sender;
    public $sender_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message_details)
    {
        $this->message_text = $message_details['message_text'];
        $this->phone_number = $message_details['phone_number'];
        $this->sender = $message_details['name'];
        $this->sender_email = $message_details['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New website contact message from {$this->sender}")
                    ->from($this->sender_email, $this->sender)
                    ->markdown('email.contact-message');
    }
}
