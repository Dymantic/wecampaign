@extends('admin.base')

@section('content')
    <team-member-page :member='@json($member)'></team-member-page>
@endsection