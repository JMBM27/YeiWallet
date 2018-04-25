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


@section("opc3")           
    select
@endsection

@section('body')
    @section('content')
        <form  method="POST">
            <div id="titulo_trans">
                Historial de transacciones
            </div>

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
