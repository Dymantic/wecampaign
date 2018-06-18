<div class="main-navbar fixed pin-t w-full flex justify-between items-center h-16 md:h-20 px-4 md:px-8">
    <div class="">
        <a href="{{ localRoute('/') }}">@include('front.svgicons.home_icon')</a>
    </div>
    <div class="flex-1 flex justify-end items-center">
        <a class="no-underline text-blue-dark hover:underline uppercase nav-font mx-4 md:mx-8" href="{{ localRoute('/services') }}">{{ trans('navbar.links.services') }}</a>
        <a class="no-underline text-blue-dark hover:underline uppercase nav-font mx-4 md:mx-8" href="{{ localRoute('/team') }}">{{ trans('navbar.links.team') }}</a>
        <a class="no-underline text-blue-dark hover:underline uppercase nav-font mx-4 md:mx-8" href="{{ localRoute('/contact') }}">
            <span class="hidden md:inline">{{ trans('navbar.links.contact') }}</span>
            <span class="md:hidden text-blue-dark flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current" height="15px" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 28"><defs><svg:style>.envel-1{fill:none;clip-rule:evenodd;}.envel-2{clip-path:url(#clip-path-envel);}.envel-3{fill:#2d3f61;}</svg:style><clipPath id="clip-path-envel"><path class="envel-1" d="M5,22a1,1,0,0,0,1,1H30a1,1,0,0,0,1-1V6a1,1,0,0,0-1-1H6A1,1,0,0,0,5,6V22Zm13.43-6.16a.93.93,0,0,1-.86,0L7,9.67V7.1l10.57,6.18a1,1,0,0,0,.86,0L29,7.1V9.67L18.43,15.85Z"/></clipPath></defs><title>envelope</title><g id="Layer_2" data-name="Layer 2"><g id="Real"><g class="envel-2"><rect class="envel-3" width="36" height="28"/></g></g></g></svg>
            </span>
        </a>
    </div>
</div>