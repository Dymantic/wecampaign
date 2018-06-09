<section>
    @foreach($team as $member)
        @include('front.team.member', ['member' => $member])
    @endforeach
</section>