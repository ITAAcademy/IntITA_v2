@extends('layouts.app')
@section('content')
    <div class='infoblock'>
        <h2>{{t::value('activeemail','0312')}}</h2>
        {{t::value('activeemail','0802')}} <a href="{{ route('verification.resend') }}">{{ t::value('activeemail','0803') }}</a> {{ t::value('activeemail','0804') }}
    </div>
@endsection
