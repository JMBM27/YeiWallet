@extends("layaouts.contenido_dashboard")


@section('title')
    Configuración
@endsection

@section('header')
    @section('header_dash')
        @section('menu_nav')
            @include("layaouts.plantilla_navbar")
        @endsection
    endsection
@endsection

@section("opc4")           
    select
@endsection


@section("sub2")           
    select2
@endsection

@section('body')
    @section('content')

        <div class="row">
             <div id="titulo_trans">
                Buzón de mensajes
            </div>
            <div class="div_leer_mensajes">
                            <a data-toggle="collapse" href="#collapse5">
                               <div class="mensaje col-xs-12 col-sm-12 col-md-12">
                                    Titulo: Problema con el servidor <br>Correo: asasasas@gmail.com
                                </div>
                            </a>
                    <div id="collapse5" class="collapse panel-collapse collapse"> 
                       <p>
                        "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
                        </p>
                    </div>  
            </div>
    @endsection
@endsection
