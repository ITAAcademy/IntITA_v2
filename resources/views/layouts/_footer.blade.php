<footer class="footer">
    <div class="footer-container">
        <div class="left-block table-cell align-top pt-2 pb-1 pl-md-3 pr-md-3 pl-1 pr-1">
            @include('layouts._social_networks')
        </div>
        <div class="center-block">
            <div class="table-cell">
                <a class="navbar-brand d-inline-block align-top p-0" href="#">
                    <img src="{{ asset('images/' . t::localeImage('logo_big.svg'))}}" alt="Logo">
                </a>
                <div class="contacts d-inline-block align-top">
                    @include('layouts._contacts')
                </div>
            </div>
            <div class="table-cell w-50 align-top d-none-md-table-cell">
                <ul class="nav navbar-nav list-inline d-inline-block">
                    @include('layouts._menu')
                </ul>
            </div>
        </div>
        <div class="right-block align-top text-center">
            <img src="{{ asset('images/up.svg')}}" alt="Logo">
        </div>
    </div>
</footer>