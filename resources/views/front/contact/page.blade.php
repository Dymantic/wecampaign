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
        <contact-form v-cloak></contact-form>
    </div>
@endsection