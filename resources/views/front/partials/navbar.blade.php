<div class="main-navbar fixed pin-t w-full flex justify-between items-center h-16 md:h-20 px-4 md:px-8 z-50">
    <div>
        <a class="text-blue-dark hover:text-purple" href="{{ localRoute('/') }}">@include('front.svgicons.home_icon')</a>
    </div>
    <div class="flex-1 flex justify-end items-center nav-inner">
        <a class="no-underline @activeclass('service') hover:underline uppercase nav-font mx-4 md:mx-8" href="{{ localRoute('/services') }}">{{ trans('navbar.links.services') }}</a>
        <a class="no-underline @activeclass('team') hover:underline uppercase nav-font mx-4 md:mx-8" href="{{ localRoute('/team') }}">{{ trans('navbar.links.team') }}</a>
        <a class="no-underline @activeclass('contact') hover:underline uppercase nav-font mx-4 md:mx-8" href="{{ localRoute('/contact') }}">{{ trans('navbar.links.contact') }}</a>
    </div>
    <div class="nav-trigger md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 33.61 28.5" height="20px"><line fill="none" stroke="#173a62" stroke-miterlimit="10" stroke-width="6px" y1="3" x2="33.61" y2="3"/><line fill="none" stroke="#173a62" stroke-miterlimit="10" stroke-width="6px" y1="14.25" x2="33.61" y2="14.25"/><line fill="none" stroke="#173a62" stroke-miterlimit="10" stroke-width="6px" y1="25.5" x2="33.61" y2="25.5"/></svg>
    </div>
</div>