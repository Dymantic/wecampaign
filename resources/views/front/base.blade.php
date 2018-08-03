<!doctype html>
<html lang="{{ app()->getLocale() }}" class="bg-blue-darker">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('title', 'Wecampaign')
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/fapp.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://use.typekit.net/iqd7uky.css">
    <meta name="google-site-verification" content="MiGoHEdgAgGVtZpenwI85cEq9fwqYHwPDfZPHXW1cGQ" />
    @yield('head')
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#d7cae4">
    <meta name="theme-color" content="#d7cae4">
</head>
<body  class="leading-normal font-serif {{ $pageClasses ?? '' }} text-black">
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->
<div id="app" class="">
    @include('front.partials.navbar')
    @yield('content')
</div>
@include('front.partials.footer')


<script src="{{ mix('js/front.js') }}"></script>
@yield('bodyscripts')
<script>
    window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
    ga('create','{{ config('services.google.analytics_id') }}','auto');ga('send','pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>
</html>
