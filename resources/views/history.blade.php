
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
        <form  method="POST" action="{{ route('history.wallet') }}">
             {{ csrf_field() }}
            @if($total>0)
                <div id="titulo_trans">
                    Historial de transacciones
                </div>
            @else
                <div id="titulo_trans">
                    No hay historial disponible
                </div>
            @endif
            
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="table-responsive" id="transacciones">
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
    @endsection
@endsection
