@extends('front.base')

@section('title', trans('team.meta.title'))

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => '',
        'ogDescription' => trans('team.meta.description'),
        'ogTitle' => trans('team.meta.title')
    ])
@endsection

@section('content')
    @include('front.team.intro')
    @include('front.team.team-members')
    @include('front.partials.page-ender')
@endsection