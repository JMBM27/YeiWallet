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

@section("v2")           
    show
@endsection

@section("sub3")           
    select2
@endsection

@section('body')
    @section('content')
       
        <form id="solicitar_codigo" method="POST" action="{{ route('code.update') }} " autocomplete="off" onsubmit="return validar_contra();">
            {{ csrf_field() }}
            
            <div id="titulo_trans">
                Solicitar código de transferencia
            </div>
            <div class="row">
                <div class="div_solicitar_codigo col-xs-12 col-sm-12 col-md-12">
                    <p> Una vez solicitado el código se le pedira cada vez que quiera realizar una transacción en nuestra página, de otro modo no sera posible el envío de esa transacción, porfavor guarde el código en un lugar donde este seguro. Si esta de acuerdo con lo explicado proceda a solicitarlo.</p>
                    
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
                    <input id="password" type="password" class="form-control" onclick="eliminar_error(3)" name="password"/><br>
                    @if ($errors->has('password'))
                        <div style="display: block;" id="error_password">
                            {{ $errors->first('password') }}
                        </div>
                    @else
                        <div id="error_password">
                        </div>
                    @endif
                    
                    <input type="submit" class="action-button1" name="create" value="Solicitar"/>
                    @if (Auth::user()->pin_status)
                        <input type="submit" class="action-button1" name="disable" value="Desactivar"/>
                    @endif
                </div>
            </div>
        </form>
    @endsection
@endsection