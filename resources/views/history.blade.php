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
        <form  method="POST">
            <div id="titulo_trans">
                Historial de transacciones
            </div>
            
            <form>
                <div class="row ordenar_historial">
                    <p>Desde:</p>
                 <div class="div_datapicker col-lg-4">
                     <div id="fecha_1" class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input id="fecha_nacimiento" class="form-control" size="16" type="text" value="" readonly onclick="eliminar_error(7);">
                        <span class="input-group-addon"onclick="eliminar_error(7);"><span class="glyphicon glyphicon-remove"><img src="Imagenes/cancelar.svg" width="15" onclick="eliminar_error(7);"></span></span>
                        <span class="input-group-addon" onclick="eliminar_error(7);"><span class="glyphicon glyphicon-calendar"><img src="Imagenes/calendario.svg" width="20"></span></span>
                    </div>
                    <div id="error_f_nacimiento"></div>
                </div>
                    <p>Hasta:</p>
                    <div class="div_datapicker col-lg-4">
                     <div id="fecha_2" class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                        <input id="fecha_nacimiento" class="form-control" size="16" type="text" value="" readonly onclick="eliminar_error(7);">
                        <span class="input-group-addon"onclick="eliminar_error(7);"><span class="glyphicon glyphicon-remove"><img src="Imagenes/cancelar.svg" width="15" onclick="eliminar_error(7);"></span></span>
                        <span class="input-group-addon" onclick="eliminar_error(7);"><span class="glyphicon glyphicon-calendar"><img src="Imagenes/calendario.svg" width="20"></span></span>
                    </div>
                    <div id="error_f_nacimiento"></div>
                </div>
                    <input type="submit" class="action-button1" value="Enviar"/>
                </div>
            </form>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive" id="transacciones">
                        <table class="table">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>ID Transacción</th>
                            <th>Usuario</th>
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
    </form>
    @endsection
@endsection
