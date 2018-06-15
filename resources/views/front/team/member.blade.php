<div class="max-w-narrow shadow-none md:shadow bg-off-white w-full mx-4 flex flex-col items-center py-8 px-8 md:px-12">
    <img src="{{ $member->avatar('thumb') }}"
         alt="{{ $member->name }}" class="h-24 rounded-full">
    <p class="h2 my-8 text-blue-light text-center">{{ $member->name }}</p>
    <p class="body">{{ $member->bio }}</p>
</div>