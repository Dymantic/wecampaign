<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name_en' => ['required_without:name_ko', 'string', 'nullable'],
            'name_ko' => ['required_without:name_en', 'string', 'nullable'],
            'bio_en' => ['string', 'nullable'],
            'bio_ko' => ['string', 'nullable']
        ];
    }

    public function member_attributes()
    {
        $fields = collect(['name_en', 'name_ko', 'bio_en', 'bio_ko']);

        return $fields->flatMap(function($field) {
            return [$field => $this->get($field, null)];
        })->all();
    }
}
