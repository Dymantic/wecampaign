<p class="body-lg text-center text-blue-dark mb-16">{{ trans('services.organizations.heading') }}</p>
<div class="bg-off-white max-w-narrow mx-auto h-64 flex flex-col rounded shadow my-12">
    <div class="flex justify-center items-center pt-4">
        @include('front.svgicons.organization_1', ['svgClass' => 'h-8'])
    </div>
    <div class="flex flex-col items-center justify-center p-8 pt-4">
        <h2 class="h2 capitalize">{{ trans('services.organizations.data_analysis.heading') }}</h2>
        <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.data_analysis.content') }}</p>
    </div>
</div>
<div class="bg-off-white max-w-narrow mx-auto h-64 flex flex-col rounded shadow my-12">
    <div class="flex justify-center items-center pt-4">
        @include('front.svgicons.organization_2', ['svgClass' => 'h-8'])
    </div>
    <div class="flex flex-col items-center justify-center p-8 pt-4">
        <h2 class="h2 capitalize">{{ trans('services.organizations.networking.heading') }}</h2>
        <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.networking.content') }}</p>
    </div>
</div>
<div class="bg-off-white max-w-narrow mx-auto h-64 flex flex-col rounded shadow my-12">
    <div class="flex justify-center items-center pt-6">
        @include('front.svgicons.organization_3', ['svgClass' => 'h-6'])
    </div>
    <div class="flex flex-col items-center justify-center p-8 pt-4">
        <h2 class="h2 capitalize">{{ trans('services.organizations.monitoring.heading') }}</h2>
        <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.monitoring.content') }}</p>
    </div>
</div>
<div class="bg-off-white max-w-narrow mx-auto h-64 flex flex-col rounded shadow my-12">
    <div class="flex justify-center items-center pt-6">
        @include('front.svgicons.organization_4', ['svgClass' => 'h-6'])
    </div>
    <div class="flex flex-col items-center justify-center p-8 pt-4">
        <h2 class="h2 capitalize">{{ trans('services.organizations.donation_culture.heading') }}</h2>
        <p class="body mt-2 text-center max-w-xs mx-auto">{{ trans('services.organizations.donation_culture.content') }}</p>
    </div>
</div>

