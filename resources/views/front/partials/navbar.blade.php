<div class="flex justify-between">
    <div>
        <a href="{{ localRoute('/') }}">{{ trans('navbar.links.home') }}</a>
    </div>
    <div>
        <a href="{{ localRoute('/services') }}">{{ trans('navbar.links.services') }}</a>
        <a href="{{ localRoute('/team') }}">{{ trans('navbar.links.team') }}</a>
        <a href="{{ localRoute('/contact') }}">{{ trans('navbar.links.contact') }}</a>
    </div>
</div>