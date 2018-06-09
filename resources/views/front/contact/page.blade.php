@extends('front.base')

@section('content')
    Contact page in {{ app()->getLocale() }}

    <contact-form v-cloak></contact-form>
@endsection