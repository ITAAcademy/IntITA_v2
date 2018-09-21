@extends('layouts.app')
@section('scripts')
    <script src="{{ asset('js/home.js') }}" defer></script>
@stop
@section('css')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@stop
@section('content')
    <div id="home" class="text-center">
        @include('home._carousel')
        @include('home._about_us')
        @include('home._steps')
        @include('home._registration')
    </div>
@endsection