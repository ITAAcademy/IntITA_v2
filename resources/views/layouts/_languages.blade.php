@foreach (Config::get('app.locales') as $language)
    <a href="{{ route('lang.switch', $language) }}" @if($language == App::getLocale()) class="selected-lang" @endif>{{$language}}</a>
@endforeach