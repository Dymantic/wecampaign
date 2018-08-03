@extends('front.base', ['pageClasses' => 'gr-sky-blue'])

@section('title', trans('services.meta.title'))

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => url('images/wecampaign_sharing_image.jpg'),
        'ogDescription' => trans('services.meta.description'),
        'ogTitle' => trans('services.meta.title')
    ])
@endsection

@section('content')
    <div class="body-topper"></div>
    @include('front.services.intro')
    <section class="flex flex-col md:flex-row justify-between max-w-2xl mx-auto pt-28">
        <div class="md:w-1/2 px-4">
            @include('front.services.individuals')
        </div>
        <div class="md:w-1/2 px-4">
            @include('front.services.organizations')
        </div>
    </section>


    @include('front.partials.page-ender')
@endsection