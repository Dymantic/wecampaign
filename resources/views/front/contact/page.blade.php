@extends('front.base', ['pageClasses' => 'gr-purple-haze'])

@section('title', trans('contact.meta.title'))

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => '',
        'ogDescription' => trans('contact.meta.description'),
        'ogTitle' => trans('contact.meta.title')
    ])
@endsection

@section('content')
    <div class="body-topper"></div>
    <section>
        <div class="max-w-lg mx-auto text-center px-4 py-28">
            <h1 class="h1 text-blue-dark mb-4">{{ trans('contact.intro.heading') }}</h1>
            <p class="body-lg text-blue-dark">{{ trans('contact.intro.content') }}</p>
        </div>

    </section>
    <div class="p-8 bg-white max-w-lg mx-auto shadow mb-28 rounded">
        <contact-form v-cloak
                      name-label="{{ trans('contact.form.name') }}"
                      email-label="{{ trans('contact.form.email') }}"
                      phone-label="{{ trans('contact.form.phone_number') }}"
                      message-label="{{ trans('contact.form.message_text') }}"
                      submit-button-text="{{ trans('contact.form.submit') }}"
                      success-text="{{ trans('contact.form.success_text') }}"
        ></contact-form>
    </div>
@endsection