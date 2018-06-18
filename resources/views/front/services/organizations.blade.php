<section id="organizations">
    <div class="max-w-lg mx-auto my-28">
        <h1 class="text-pink h1 text-center mb-28">{{ trans('services.organizations.heading') }}</h1>
        <div class="flex flex-col md:flex-row min-h-64 bg-off-white rounded md:flex-row-reverse mx-4 md:mx-0 shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center pt-6 md:pt-0">
                @include('front.svgicons.organization_1', ['svgClass' => 'h-12 md:h-20'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-8">
                <h2 class="h2 capitalize text-center text-purple">{{ trans('services.organizations.data_analysis.heading') }}</h2>
                <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.data_analysis.content') }}</p>
            </div>

        </div>
        <div class="flex flex-col md:flex-row min-h-64 bg-off-white rounded mx-4 md:mx-0 shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center pt-6 md:pt-0">
                @include('front.svgicons.organization_2', ['svgClass' => 'h-12 md:h-20'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-8">
                <h2 class="h2 capitalize text-center text-purple">{{ trans('services.organizations.networking.heading') }}</h2>
                <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.networking.content') }}</p>
            </div>
        </div>
        <div class="flex flex-col md:flex-row min-h-64 bg-off-white rounded md:flex-row-reverse mx-4 md:mx-0 shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center pt-6 md:pt-0">
                @include('front.svgicons.organization_3', ['svgClass' => 'h-12 md:h-20'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-8">
                <h2 class="h2 capitalize text-center text-purple">{{ trans('services.organizations.monitoring.heading') }}</h2>
                <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.monitoring.content') }}</p>
            </div>

        </div>
        <div class="flex flex-col md:flex-row min-h-64 bg-off-white rounded mx-4 md:mx-0 shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center pt-6 md:pt-0">
                @include('front.svgicons.organization_4', ['svgClass' => 'h-12 md:h-20'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center justify-center p-8">
                <h2 class="h2 capitalize text-center text-purple">{{ trans('services.organizations.donation_culture.heading') }}</h2>
                <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.donation_culture.content') }}</p>
            </div>
        </div>
    </div>
</section>