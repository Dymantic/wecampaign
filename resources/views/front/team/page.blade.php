@extends('front.base', ['pageClasses' => 'gr-blue-light'])

@section('title', trans('team.meta.title'))

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => '',
        'ogDescription' => trans('team.meta.description'),
        'ogTitle' => trans('team.meta.title')
    ])
@endsection

@section('content')
    <div class="body-topper"></div>
    @include('front.team.intro')
    @include('front.team.team-members')
    <img src="/images/the_team.jpg"
         alt="The WeCampaign team together" class="max-w-md mx-auto w-full my-20 block">
    @include('front.partials.page-ender')
@endsection