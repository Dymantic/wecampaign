@extends('front.base')

@section('content')
    Team page in {{ app()->getLocale() }}

    @foreach($team as $member)
        <div>
            <p>{{ $member->name }}</p>
            <p>{{ $member->bio }}</p>
        </div>
    @endforeach
@endsection