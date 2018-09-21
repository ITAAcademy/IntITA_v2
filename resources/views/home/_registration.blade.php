<a name="form"></a>
<div class="reg-form pt-5 pb-5">
    <div class="regFormBox">
        <p class="reg-title">{{t::value('regform','0009')}}</p>
        <p class="reg-subtitle">{{t::value('regform','0010')}}</p>
        <div class="signInForm">
            <auth-form
                    :id="'auth'"
                    :modal_mode="false"
                    :login_url = "'{!! route('login') !!}'"
                    :register_url = "'{!! route('register') !!}'"
                    :ph_email="'{!! t::value('regform', '0014') !!}'"
                    :sign-in=false
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
        </div>
    </div>
</div>
