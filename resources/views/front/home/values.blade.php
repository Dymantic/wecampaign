<section class="">
    <div class="py-28 max-w-lg mx-auto">
        <h1 class="h1 text-blue-dark mb-20 text-center">{{ trans('homepage.values.heading') }}</h1>
        <h2 class="h2 text-center text-blue-dark mb-12">{{ trans('homepage.values.continuity.heading') }}</h2>
        <div class="flex flex-col md:flex-row justify-between">
            <div class="flex-1 flex flex-col items-center mx-8">
                @include('front.svgicons.continuity_1')
                <p class="body mt-4">{{ trans('homepage.values.continuity.part_one') }}</p>
            </div>
            <div class="flex-1 flex flex-col items-center mx-8">
                @include('front.svgicons.continuity_2')
                <p class="body mt-4">{{ trans('homepage.values.continuity.part_two') }}</p>
            </div>
            <div class="flex-1 flex flex-col items-center mx-8">
                @include('front.svgicons.continuity_3')
                <p class="body mt-4">{{ trans('homepage.values.continuity.part_three') }}</p>
            </div>
        </div>
        <div class="mt-28">
            <h2 class="h2 text-blue-dark mb-12 text-center">{{ trans('homepage.values.transparency.heading') }}</h2>
            <div class="max-w-sm text-center mx-auto">
                @include('front.svgicons.transparency')
                <p class="mt-4 body px-8 text-left md:left-center">{{ trans('homepage.values.transparency.content') }}</p>
            </div>
        </div>
        <div class="h-48 hidden md:block"></div>
    </div>

</section>