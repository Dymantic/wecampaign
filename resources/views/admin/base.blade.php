<!doctype html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1 shrink-to-fit=no">
    @section('title')
        <title>Website | Admin </title>
    @show
    <link rel="stylesheet"
          href="{{ mix('css/app.css') }}"/>
    <meta id="csrf-token-meta"
          name="csrf-token"
          content="{{ csrf_token() }}">
    <META NAME="ROBOTS"
          CONTENT="NOINDEX, NOFOLLOW">
    @yield('head')
</head>
<body class="h-full leading-normal">
<div id="app" class="min-h-full font-sans flex flex-col">
    @if(Auth::check())
        @include('admin.partials.navbar')
    @else
        @include('admin.partials.fakenavbar')
    @endif
    <div class="max-w-xl w-full px-4 mx-auto flex-1">
        @yield('content')
    </div>
</div>

{{--<div class="main-footer"></div>--}}
<script src="{{ mix('js/app.js') }}"></script>
{{--@include('admin.partials.flash')--}}
@yield('bodyscripts')
</body>
</html>