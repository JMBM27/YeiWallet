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

@section("v1")           
    show
@endsection

@section("sub1")           
    select2
@endsection

@section('body')
    @section('content')
        <form id="cambio_contraseña" method="POST" action="{{ route('password.update') }} " autocomplete="off" onsubmit="return validar_contraseñas();">
            {{ csrf_field() }}

            <div id="titulo_trans">Actualizar su contraseña</div>
            <div class="row">
                <div class="div_actualizar_correo col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <p>Ingrese su contraseña actual</p>
                    <input id="password" type="password" class="form-control" onclick="eliminar_error(3)" name="old"/><br>
                    @if ($errors->has('old'))
                        <div style="display: block;" id="error_password">
                            {{ $errors->first('old') }}
                        </div>
                    @else
                        <div id="error_password">
                        </div>
                    @endif
                    <p>Ingrese su nueva contraseña</p>
                    <input id="password-confirm" type="password" class="form-control" onclick="eliminar_error(4)" name="password"/><br>
                    @if ($errors->has('password'))
                        <div style="display: block;" id="error_password_2">
                            {{ $errors->first('password') }}
                        </div>
                    @else
                        <div id="error_password_2">
                        </div>
                    @endif
                    <p>Verifique su nueva contraseña</p>
                    <input id="password-confirm-2" type="password" class="form-control" onclick="eliminar_error(4)" name="password_confirmation"/>
                    <div id="error_password_2"></div>
                   <input type="submit" class="action-button1" value="Enviar"/>
                </div>
            </div>
        </form>
    @endsection
@endsection



