<header class="navbar navbar-expand-md flex-column flex-md-row bd-navbar pl-5 pr-5">
    <a class="navbar-brand" href="{{url('')}}">
        <img src="{{ asset('images/' . t::localeImage('logo_big.svg'))}}" alt="Logo">
    </a>

    <div id="hamburger-container">
        <button class="navbar-toggler toggler-example btn-hamburger collapsed" type="button" data-toggle="collapse"
                data-target="#hamburger" aria-controls="hamburger" aria-expanded="false" aria-label="Toggle hamburger">
        <span class="color-main-blue">
            <i class="fa fa-bars fa-2x"></i>
        </span>
        </button>
        <div class="navbar-collapse collapse" id="hamburger" style="">
            <a class="navbar-brand d-md-none" href="{{url('')}}">
                <img src="{{ asset('images/' . t::localeImage('logo_big.svg'))}}" alt="Logo">
            </a>
            <div class="language-row d-md-none">
                @include('layouts._languages')
            </div>
            <ul class="nav navbar-nav list-inline">
                @include('layouts._menu')
            </ul>
            <div class="hamburger-line mt-1 mb-2"></div>
            <div class="text-center d-md-none">
                @include('layouts._auth_button', array('id' => 'hamburgerLogout'))
            </div>
            @auth
                <div class="hamburger-avatar d-md-none">
                    <a href="#">
                        <div>
                            <img src="https://cdn4.iconfinder.com/data/icons/danger-soft/512/people_user_business_web_man_person_social-512.png">
                        </div>
                        <div class="status">
                            @if (Auth::user()->fullName())
                                <div class="status-color">{{ Auth::user()->nickname }}</div>
                                <div class="status-color">{{ Auth::user()->firstName }}</div>
                                <div class="status-color">{{ Auth::user()->secondName }}</div>
                            @else
                                <div class="text-muted">[{{ t::value('regexp', '163')}}]</div>
                                <div class="text-muted">[{{ t::value('regexp', '160')}}]</div>
                                <div class="text-muted">[{{ t::value('regexp', '162')}}]</div>
                            @endif
                            <div class="status-color"><small>■ online</small></div>
                        </div>
                    </a>
                </div>
            @endauth
        </div>
    </div>
    <div class="navbar-nav flex-row ml-md-auto d-none d-md-flex">
        <div class="header-auth">
            <div class="language-row">
                @include('layouts._languages')
            </div>
            <div class="button_border"></div>
            @include('layouts._auth_button', array('id' => 'mainLogout'))
        </div>
    </div>

    <!-- Modal -->
    <auth-form
    :id="'modalAuth'"
    :modal_mode="true"
    :login_url = "'{!! route('login') !!}'"
    :register_url = "'{!! route('register') !!}'"
    :ph_email="'{!! t::value('regform', '0014') !!}'"
    :sign-in=true
    :ph_password="'{!! t::value('regform', '0015') !!}'"
    :login_button="'{!! t::value('regform', '0093') !!}'"
    :registration_button="'{!! t::value('regform', '0013') !!}'"
    :forgot_pass_title="'{!! t::value('regform', '0092') !!}'"
    :registration_title="'{!! t::value('registration', '0591') !!}'"
    :full_registration_title="'{!! t::value('regform', '0011') !!}'"
    :login_title="'{!! t::value('regform', '0806') !!}'"
    :network_title="'{!! t::value('regform', '0091') !!}'"
    :facebook_svg="'{!! asset('images/networks/F.svg') !!}'"
    :google_svg="'{!! asset('images/networks/G+.svg') !!}'"
    :in_svg="'{!! asset('images/networks/In.svg') !!}'"
    :twitter_svg="'{!! asset('images/networks/Tw.svg') !!}'"
    ></auth-form>
</header>