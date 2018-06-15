@extends('front.base', ['pageClasses' => 'services-page'])

@section('title', trans('services.meta.title'))

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => '',
        'ogDescription' => trans('services.meta.description'),
        'ogTitle' => trans('services.meta.title')
    ])
@endsection

@section('content')
    @include('front.services.sub-nav')
    @include('front.services.individuals')
    @include('front.services.organizations')
    @include('front.partials.page-ender')
@endsection