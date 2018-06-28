<section class="">
    <div class="py-28 px-0 md:px-4 max-w-xl mx-auto">
        <h1 class="h1 text-blue-dark mb-20 text-center">{{ trans('homepage.values.heading') }}</h1>
        <h2 class="h2 text-center text-orange mb-12">{{ trans('homepage.values.continuity.heading') }}</h2>
        <div class="flex flex-col md:flex-row justify-between">
            <div class="bg-off-white mb-8 rounded shadow p-8 flex-1 flex flex-col items-center mx-4">
                @include('front.svgicons.continuity_1')
                <p class="text-center body mt-4">{{ trans('homepage.values.continuity.part_one') }}</p>
            </div>
            <div class="bg-off-white mb-8 rounded shadow p-8 flex-1 flex flex-col items-center mx-4">
                @include('front.svgicons.continuity_2')
                <p class="text-center body mt-4">{{ trans('homepage.values.continuity.part_two') }}</p>
            </div>
            <div class="bg-off-white mb-8 rounded shadow p-8 flex-1 flex flex-col items-center mx-4">
                @include('front.svgicons.continuity_3')
                <p class="text-center body mt-4">{{ trans('homepage.values.continuity.part_three') }}</p>
            </div>
        </div>
        <div class="mt-28">
            <h2 class="h2 text-orange mb-12 text-center">{{ trans('homepage.values.transparency.heading') }}</h2>
            <div class="max-w-narrow bg-off-white rounded shadow p-8 text-center mx-auto">
                @include('front.svgicons.transparency')
                <p class="text-center mt-4 body px-0 md:px-8 text-left md:left-center">{{ trans('homepage.values.transparency.content') }}</p>
            </div>
        </div>
    </div>

</section>