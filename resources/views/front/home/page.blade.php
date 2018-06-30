@extends('front.base', ['pageClasses' => 'bg-white'])

@section('title', trans('homepage.meta.title'))

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => '',
        'ogDescription' => trans('homepage.meta.description'),
        'ogTitle' => trans('homepage.meta.title')
    ])
@endsection

@section('content')
    @include('front.home.banner')
    @include('front.home.about')
    @include('front.home.goals')
    @include('front.home.values')
    @include('front.home.app-preview')
@endsection