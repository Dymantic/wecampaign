<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactForm extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'         => ['required'],
            'email'        => ['required', 'email'],
            'message_text' => ['required']
        ];
    }

    public function fields()
    {
        return [
            'name'         => $this->name,
            'email'        => $this->email,
            'message_text' => $this->message_text,
            'phone_number' => $this->get('phone_number', 'Not submitted')
        ];
    }
}
