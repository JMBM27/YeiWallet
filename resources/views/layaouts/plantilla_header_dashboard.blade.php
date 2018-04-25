    
    <div class="header_dashboard">
    <nav class="navbar-light navbar-toggleable-sm">
            <div class="navbar-header">
            <div class="divLogo">
                <a class ="Link_Header" href="http://localhost/YeiWallet/public/dashboard">
                    <img alt="Logo" height="40" src="{{ asset('Imagenes/LOGO1.1.svg') }}" width="40">Wallet</a>
            </div>
            <button class="navbar-toggler navbar-toggler-right menu-icon" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        </nav>
     
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <div class="nav navbar-nav navbar-right">
                  @yield('menu_nav')
            </div>
        </div>
        @yield('header_dashboard')
    </div>
