@extends('layouts.mail.app')
@section('content')
    <h4>{{ t::value('mail', '0839') }}</h4>
    <br>
    <span>{{ t::value('recovery', '0239') }}</span>
    <br>
    <a href={{url("{$link}")}}>
        {{ t::value('mail', '0856') }}
    </a>
@endsection