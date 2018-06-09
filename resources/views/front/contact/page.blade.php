@extends('front.base')

@section('title', trans('contact.meta.title'))

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => '',
        'ogDescription' => trans('contact.meta.description'),
        'ogTitle' => trans('contact.meta.title')
    ])
@endsection

@section('content')
    <section>
        <h1>{{ trans('contact.intro.heading') }}</h1>
        <p>{{ trans('contact.intro.content') }}</p>
    </section>
    <div>
        <p>the svg</p>

    </div>
    <div>
        <contact-form v-cloak
                      name-label="{{ trans('contact.form.name') }}"
                      email-label="{{ trans('contact.form.email') }}"
                      phone-label="{{ trans('contact.form.phone_number') }}"
                      message-label="{{ trans('contact.form.message_text') }}"
                      submit-button-text="{{ trans('contact.form.submit') }}"
        ></contact-form>
    </div>
@endsection