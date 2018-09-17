@extends('layouts.mail.app')
@section('content')
    <h4>{{ t::value('mail', '0839') }}</h4>
    <span>{{ t::value('activeemail', '0299') }}</span>
    <a href={{url("register/confirm/{$user->token}")}}>
        {{ t::value('mail', '0855') }}
    </a>
    <br>
    {{ t::value('mail', '0840') }}
@endsection