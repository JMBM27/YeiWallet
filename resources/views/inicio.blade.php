@extends('layaouts.plantilla')


        @section('title')
            Inicio
        @endsection

        <div class="header">
            <div class="divLogo">
                <a class ="Link_Header" href="http://www.facebook.com">
                    <img alt="Logo" height="50" src="Imagenes/LOGO1.1.svg" width="50">Wallet</a>
            </div>

            <div class="divRegistrarse">
                 <a class="Link_Header" href="/sign">Registrarse</a>
             </div>
            <a class="divIngresar" href="/login">Ingresar</a>
        </div>

<nav class="navbar-light navbar-toggleable-sm">
    <a href="#" class="navbarLogo">
        <img src="Imagenes/LOGO1.1.svg" width="30" alt="Logo" class="d-inline-block align-top">Wallet
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="/login">Ingresar</a>
            <a class="nav-item nav-link" href="/sign">Registrarse</a>
        </div>
    </div>
</nav>


        @section("body")

            <section class="splash">
                <article>
                    <div id="espacio">
                        <canvas id="lineas" style="display:block;"></canvas>
                        <div class="divAlgo" id="centrado_CryptInfor">
                            Conozca con cuáles cryptomonedas trabajamos
                            <a href="#Seccion_crypt" class="class_a_href">
                                <h4>Aprenda más</h4>
                            </a>
                        </div>
                    </div>
                </article>
            </section>

                <div class="row">
                    <div class="divBen">
                        Más sobre nuestra Wallet
                    </div>

                    <div class="divInfo col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="divInformacion" data-aos="fade-right" data-aos-duration="2000">
                            <img alt="Social" height="200" src="Imagenes/Transferencia.svg" width="100%" data-aos="fade-down" data-aos-duration="3000"></img>
                            Transfiere dinero a tu familia, amigos, de forma sencilla y rápida.
                        </div>
                    </div>

                    <div align="center" class="divInfo col-xs-12 col-sm-12 col-md-4 col-lg-4" >
                        <div class="divInformacion" data-aos="fade-down" data-aos-duration="2000">
                            <img alt="Seguridad" height="200" src="Imagenes/Seguridad.svg" width="100%" data-aos="fade-down" data-aos-duration="3000"></img>
                            Al implementar 'BlockChain' todas tus transacciones están seguras.
                            </img>
                        </div>
                    </div>

                    <div class="divInfo col-xs-12 col-sm-12 col-md-4 col-lg-4" align="center">
                        <div class="divInformacion" data-aos="fade-left" data-aos-duration="2000">
                            <img alt="Comodidad" height="200" src="Imagenes/Portabilidad.svg" width="100%" data-aos="fade-down" data-aos-duration="3000"></img>
                            Accede a nuestra página desde cualquiera de tus dispositivos.
                        </div>
                    </div>

                    <!-- DIV DONDE SALE LA INFORMACION DE QUE CRYPTOMONEDA USAMOS-->

                    <div class="divInfoCrypt" id="Seccion_crypt" data-aos="fade-down" data-aos-duration="2000" data-aos-delay="400">
                        <p>¿Con cuáles Cryptomonedas trabajamos?</p>
                        <div class="divTxtCrypt col-xs-12 col-sm-12 col-md-6"
                             data-aos="zoom-out-right" data-aos-duration="2000" data-aos-delay="400">
                            Trabajamos con las cryptomonedas
                            más seguras como Bitcoin. Además nuestro
                            equipo está implementando Onixcoin una cryptomoneda Venezolana con una futura trayectoria internacional.
                        </div>

                        <div class="divImgCrypt col-xs-12 col-sm-12 col-md-6">
                            <img src="Imagenes/Bitcoin.svg" width="250" height="250" style="margin-bottom: 30px;" data-aos="flip-left" data-aos-duration="2000">
                            <img src="Imagenes/onix.svg"
                                 width="250" height="250" style="margin-bottom: 30px;" data-aos="flip-right" data-aos-duration="2000" data-aos-delay="500">
                        </div>
                    </div>
                </div>

         @section("footer")
            <h1>YeiWallet</h1>
            <p>Copyright © - 2018 YeiWallet</p>
        @endsection

@endsection











