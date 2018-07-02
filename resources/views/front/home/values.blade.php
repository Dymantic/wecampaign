<section class="">
    <div class="py-28 px-0 md:px-4 max-w-xl mx-auto">
        <h1 class="h1 text-blue-dark mb-20 text-center">{{ trans('homepage.values.heading') }}</h1>
        <div class="flex flex-col md:flex-row md:flex-wrap justify-center">
            <div class="max-w-xs md:w-1/2 bg-off-white mb-8 md:mb-16 rounded shadow p-8 flex flex-col items-center mx-4 md:mx-8">
                @include('front.svgicons.continuity_1')
                <h2 class="text-center text-blue-dark h2 capitalize mt-4 mb-6">{{ trans('homepage.values.assurance.heading') }}</h2>
                <p class="text-center body">{{ trans('homepage.values.assurance.content') }}</p>
            </div>
            <div class="max-w-xs md:w-1/2 bg-off-white mb-8 md:mb-16 rounded shadow p-8 flex flex-col items-center mx-4 md:mx-8">
                @include('front.svgicons.continuity_2')
                <h2 class="text-center text-blue-dark h2 capitalize mt-4 mb-6">{{ trans('homepage.values.permanence.heading') }}</h2>
                <p class="text-center body">{{ trans('homepage.values.continuity.content') }}</p>
            </div>
            <div class="max-w-xs md:w-1/2 bg-off-white mb-8 md:mb-16 rounded shadow p-8 flex flex-col items-center mx-4 md:mx-8">
                @include('front.svgicons.continuity_3')
                <h2 class="text-center text-blue-dark h2 capitalize mt-4 mb-6">{{ trans('homepage.values.continuity.heading') }}</h2>
                <p class="text-center body">{{ trans('homepage.values.continuity.content') }}</p>
            </div>
            <div class="max-w-xs md:w-1/2 bg-off-white mb-8 md:mb-16 rounded shadow p-8 flex flex-col items-center mx-4 md:mx-8">
                @include('front.svgicons.transparency')
                <h2 class="text-center text-blue-dark h2 capitalize mt-4 mb-6">{{ trans('homepage.values.transparency.heading') }}</h2>
                <p class="text-center body">{{ trans('homepage.values.transparency.content') }}</p>
            </div>
        </div>
        <div class="mt-28">

        </div>
    </div>

</section>