<section>
    <div class="max-w-xl mx-auto flex flex-wrap justify-around lg:justify-between pb-28">
        @foreach($team as $member)
            @include('front.team.member', ['member' => $member])
        @endforeach
    </div>
</section>