<section class="gr-blue-light">
    <div class="max-w-xl px-4 mx-auto py-28">
        <h1 class="text-center h1 text-blue-dark mb-20">@lang('homepage.goals.heading')</h1>
        <div class="flex flex-col md:flex-row justify-between items-stretch mx-4 md:mx-0">
            <div class="bg-off-white flex-1 my-8 md:my-0 flex flex-col items-center mr-0 md:mr-4 text-blue-dark shadow rounded py-4 px-8 items-center">
                @include('front.svgicons.give_voice')
                <h2 class="text-center h2 capitalize mt-4 mb-6">{{ trans('homepage.goals.voice.heading') }}</h2>
                <p class="body pb-4 text-center">{{ trans('homepage.goals.voice.content') }}</p>
            </div>
            <div class="bg-off-white flex-1 my-8 md:my-0 flex flex-col items-center mx-0 md:mx-4 text-blue-dark shadow rounded py-4 px-8">
                @include('front.svgicons.raise_awareness')
                <h2 class="text-center h2 capitalize mt-4 mb-6">{{ trans('homepage.goals.awareness.heading') }}</h2>
                <p class="body pb-4 text-center">{{ trans('homepage.goals.awareness.content') }}</p>
            </div>
            <div class="bg-off-white flex-1 my-8 md:my-0 flex flex-col items-center ml-0 md:ml-4 text-blue-dark shadow rounded py-4 px-8">
                @include('front.svgicons.break_stereotypes')
                <h2 class="text-center h2 capitalize mt-4 mb-6">{{ trans('homepage.goals.stereotypes.heading') }}</h2>
                <p class="body pb-4 text-center">{{ trans('homepage.goals.stereotypes.content') }}</p>
            </div>
        </div>
    </div>
</section>