<div class="max-w-narrow shadow bg-off-white w-full mx-4 mb-12 flex flex-col items-center py-8 px-8 md:px-12 member-card">
    <img src="{{ $member->avatar('thumb') }}"
         alt="{{ $member->name }}" class="h-48 blackened">
    <p class="h2 my-8 text-purple text-center">{{ $member->name }}</p>
    <p class="body">{{ $member->bio }}</p>
</div>