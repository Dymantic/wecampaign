<section id="individuals">
    <div class="max-w-lg mx-4 md:mx-auto my-28">
        <h1 class="h1 text-center text-blue-dark mb-16">{{ trans('services.individuals.heading') }}</h1>
        <div class="bg-off-white flex flex-col md:flex-row md:flex-row-reverse rounded shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center">
                @include('front.svgicons.individuals_1', ['svgClass' => 'h-12 md:h-32'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center p-8">
                <h2 class="h2 capitalize">{{ trans('services.individuals.information_access.heading') }}</h2>
                <p class="body mt-4 text-center max-w-xs mx-auto">{{ trans('services.individuals.information_access.content') }}</p>
            </div>

        </div>
        <div class="bg-off-white flex flex-col md:flex-row rounded shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center">
                @include('front.svgicons.individuals_2', ['svgClass' => 'h-12 md:h-32'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center p-8">
                <h2 class="h2 capitalize">{{ trans('services.individuals.donation_tracking.heading') }}</h2>
                <p class="body mt-4 text-center max-w-xs mx-auto">{{ trans('services.individuals.donation_tracking.content') }}</p>
            </div>
        </div>
        <div class="bg-off-white flex flex-col md:flex-row md:flex-row-reverse rounded shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center">
                @include('front.svgicons.individuals_3', ['svgClass' => 'h-12 md:h-32'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center p-8">
                <h2 class="h2 capitalize">{{ trans('services.individuals.one_touch_donation.heading') }}</h2>
                <p class="body mt-4 text-center max-w-xs mx-auto">{{ trans('services.individuals.one_touch_donation.content') }}</p>
            </div>

        </div>
        <div class="bg-off-white flex flex-col md:flex-row rounded shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center">
                @include('front.svgicons.individuals_4', ['svgClass' => 'h-12 md:h-32'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center p-8">
                <h2 class="h2 capitalize">{{ trans('services.individuals.communication_channel.heading') }}</h2>
                <p class="body mt-4 text-center max-w-xs mx-auto">{{ trans('services.individuals.communication_channel.content') }}</p>
            </div>
        </div>
        <div class="bg-off-white flex flex-col md:flex-row md:flex-row-reverse rounded shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center">
                @include('front.svgicons.individuals_5', ['svgClass' => 'h-12 md:h-32'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center p-8">
                <h2 class="h2 capitalize">{{ trans('services.individuals.sns_function.heading') }}</h2>
                <p class="body mt-4 text-center max-w-xs mx-auto">{{ trans('services.individuals.sns_function.content') }}</p>
            </div>

        </div>
        <div class="bg-off-white flex flex-col md:flex-row rounded shadow my-12">
            <div class="w-full md:w-1/2 flex justify-center items-center">
                @include('front.svgicons.individuals_6', ['svgClass' => 'h-12 md:h-32'])
            </div>
            <div class="w-full md:w-1/2 flex flex-col items-center p-8">
                <h2 class="h2 capitalize">{{ trans('services.individuals.monitoring.heading') }}</h2>
                <p class="body mt-4 text-center max-w-xs mx-auto">{{ trans('services.individuals.monitoring.content') }}</p>
            </div>
        </div>
    </div>
</section>