@extends('layouts.app')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

@section('content')
    <div class="text-center">
        @include('home._carousel')
        @include('home._about_us')
        @include('home._steps')
        @include('home._banners')
        @include('home._registration')
    </div>
@endsection