<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactForm;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function receive(ContactForm $contactForm)
    {
        Mail::to(config('contact-messages.recipients', []))
            ->send(new ContactMessage($contactForm->fields()));
    }
}
