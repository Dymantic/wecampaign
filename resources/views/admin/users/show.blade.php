@extends('admin.base')

@section('content')
<user-page :user-attributes='@json($user)'></user-page>
@endsection