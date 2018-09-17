@extends('layouts.app')
@section('content')
    <div class='infoblock'>
        <h2>{{t::value('activeemail', '0306')}}</h2>
        {{t::value('activeemail', '0307')}} {{ Session::get('email') }} {{t::value('activeemail', '0308')}}
    </div>
@endsection