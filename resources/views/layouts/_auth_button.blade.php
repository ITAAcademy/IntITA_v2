@guest
    <button type="button" class="btn btn-intita btn-auth" data-toggle="modal" data-target="#modalAuth">
        {{ t::value('header', '0019') }}
    </button>
@else
    <button type="button" class="btn btn-intita btn-auth" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('{{$id}}').submit();">
        {{ t::value('header','0020') }}
    </button>
    <form id="{{$id}}" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
@endguest