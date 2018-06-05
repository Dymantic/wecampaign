@extends('admin.base')

@section('content')
<team-index :team='@json($team)'></team-index>
@endsection