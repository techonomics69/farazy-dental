@extends('layouts.front-end',['title' => 'Specialist'])

@section('content')
    <specialist :specialists="{doctors: {{ $doctors }},departments: {{ $departments }}}"></specialist>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('core-files/public/js/app.js') }}"></script>
@endsection