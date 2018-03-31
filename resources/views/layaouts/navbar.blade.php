<!doctype html>

<html lang="en">

    <body>
        <div class="row">
            <div class="div_izq_dashboard col-xs-12 col-sm-3 col-md-3 col-lg-2">
                <nav class="nav_dashboard">
                    <ul>
                        @yield("menu")
                    </ul>
                </nav>
            </div>

            <div class="div_der_dashboard col-xs-12 col-sm-9 col-md-9 col-lg-10" id="div_derecho">
                @yield("content")
                <script src="{{ asset('js/checked.js') }}"></script>
            </div>
        </div>

    </body>
</html>
