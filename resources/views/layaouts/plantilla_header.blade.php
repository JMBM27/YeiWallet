<!doctype html>
<html lang="en">

    <header>
        <div class="header">
            <div class="divLogo">
                <a class ="Link_Header" href="{{ route('home') }}">
                    <img src="{{ asset('Imagenes/LOGO1.1.svg') }}" alt="LOGO" width="50">YeiWallet</a>
            </div>

            @yield('header')
        </div>
    </header>
</html>