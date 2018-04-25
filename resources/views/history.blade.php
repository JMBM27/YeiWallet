
@extends("layaouts.contenido_dashboard")


@section('title')
    Historial
@endsection

 @section('header')
    @section('header_dash')
        @section('menu_nav')
            @include("layaouts.plantilla_navbar")
        @endsection
    endsection
@endsection


@section("opc3")           
    select
@endsection

@section('body')
    @section('content')
<<<<<<< HEAD
        <form  method="POST" action="{{ route('history.wallet') }}">
             {{ csrf_field() }}
            @if($total>0)
                <div id="titulo_trans">
                    Historial de transacciones
                </div>
            @else
                <div id="titulo_trans">
                    No hay historial disponible
=======
        <form  onsubmit="return validar_fecha_historial();">
            <div id="titulo_trans">
                Historial de transacciones
            </div>
            
                <div class="row ordenar_historial">
                    <p>Desde:</p>
                 <div class="div_datapicker col-lg-4">
                     <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input id="fecha_1" class="form-control" size="16" type="text" value="" readonly onclick="eliminar_error(7);">
                        <span class="input-group-addon" onclick="eliminar_error(7);"><span class="glyphicon glyphicon-remove"><img src="Imagenes/cancelar.svg" width="15"></span></span>
                        <span class="input-group-addon" onclick="eliminar_error(7);"><span class="glyphicon glyphicon-calendar"><img src="Imagenes/calendario.svg" width="20"></span></span>
                    </div>
                    <div id="error_f_nacimiento"></div>
                </div>
                    <p>Hasta:</p>
                    <div class="div_datapicker col-lg-4">
                     <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input id="fecha_2" class="form-control" size="16" type="text" value="" readonly onclick="eliminar_error(1);">
                        <span class="input-group-addon"onclick="eliminar_error(7);"><span class="glyphicon glyphicon-remove"><img src="Imagenes/cancelar.svg" width="15"></span></span>
                        <span class="input-group-addon" onclick="eliminar_error(1);"><span class="glyphicon glyphicon-calendar"><img src="Imagenes/calendario.svg" width="20"></span></span>
                    </div>
                    <div id="error_usuario"></div>
                </div>
                    <input type="submit" class="action-button1" value="Enviar"/>
>>>>>>> 281cbabe959e2dbb63a1806ce6f6af5fde5d12bf
                </div>
            @endif
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive" id="transacciones">
<<<<<<< HEAD
                        @if($total>0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>ID Transacción</th>
                                        <th>Adrress</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php echo $history;?>
                                </tbody>
                            </table>
                        @endif
        
                        @if($page>0)
                            <input type="submit" class="action-button1" name="action" value="Ant"/>
                        @endif
                        @if($page<$ult)
                            <input type="submit" class="action-button1" name="action" value="Sig"/>
                        @endif
                    </div>
                </div>
            </div>
            
            <input type="hidden" name="tipo" value="<?php echo $tipo; ?>"/> 
            <input type="hidden" name="page" value="<?php echo $page; ?>"/> 
    </form>
=======
                        <table class="table">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>ID Transacción</th>
                            <th>Dirección</th>
                            <th>Cantidad</th>
                            <th>Estado</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>26-06-2018 7:45:00</td>
                            <td>000001</td>
                            <td>31uEbMgunupShBVTewXjtqbBv5MndwfXhb</td>
                            <td>0,000055</td>
                            <td>Aprobado</td>
                        </tr>
                        <tr>
                            <td>26-06-2018 7:45:00</td>
                            <td>000001</td>
                            <td>31uEbMgunupShBVTewXjtqbBv5MndwfXhb</td>
                            <td>0,000055</td>
                            <td>Aprobado</td>
                        </tr>
                        <tr>
                            <td>26-06-2018 7:45:00</td>
                            <td>000001</td>
                            <td>31uEbMgunupShBVTewXjtqbBv5MndwfXhb</td>
                            <td>0,000055</td>
                            <td>Aprobado</td>
                        </tr>
                        <tr>
                            <td>26-06-2018 7:45:00</td>
                            <td>000001</td>
                            <td>31uEbMgunupShBVTewXjtqbBv5MndwfXhb</td>
                            <td>0,000055</td>
                            <td>Aprobado</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
>>>>>>> 281cbabe959e2dbb63a1806ce6f6af5fde5d12bf
    @endsection
@endsection
