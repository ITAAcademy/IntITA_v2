<div class="main-carousel d-none d-sm-block">
    <carousel
            :url = "'{!! route('carousel.index') !!}'"
            :banner_path = "'{!! asset('storage') !!}/images/carousel/'"
            :lg = "'{!! App::getLocale() !!}'"
            :title = "'{!! t::value('slider', '0005') !!}'"
            :image="'{!! asset('images/mainpage/line.png') !!}'"
            :btn_title= "'{!! t::value('slider', '0008') !!}'"
    >
    </carousel>
    <img class="mouse" src="{{ asset('images/mainpage/mouseLine.png')}}">
</div>