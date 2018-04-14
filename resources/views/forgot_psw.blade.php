@extends("layaouts.plantilla_login_sign")

    @section("title")
       Recuperar su Contraseña
    @endsection


    @section("body")
            <form id="msform" class="form-horizontal" method="POST" action="{{ route('password.email') }} " onsubmit="return validar_email();">
                {{ csrf_field() }}
                <fieldset>
                    <p class="formulario_titulo">Recuperar Contraseña</p>
                    <hr>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="Ingrese su correo electrónico" class="form-control" name="email" value="{{ old('email') }}" onclick="eliminar_error(2);">
                            
                            @if ($errors->has('email'))
                                <div style="display: block;" id="error_email">
                                    {{ $errors->first('email') }}
                                </div>
                            @else
                                <div id="error_email">
                                </div>
                            @endif
                        </div>
                    </div>
                    <input type="button" class="volver action-button" value="Volver">
                    <input type="submit" name="next" class="action-button" value="Enviar"/>
                </fieldset>
                
                @section('titulo_ventana')
                    <div class="formulario_titulo" style="margin-left: 70px;">Ingresar el código</div>
                @endsection

                @section('body_ventana')
                    <div class="div_info_correo">
                        <small>Hemos enviado un correo a <strong>joseboscan11@gmail.com</strong><br>porfavor revise que le haya llegado</small>
                    </div>
                    <input type="text" minlength="6" maxlength="6" placeholder="Ingrese el código"/>
                @endsection

                @section('footer_ventana')
                     <a href="#" id="hide"><small>No he recibido el correo, enviar de nuevo el código</small></a>
                     <input type="submit" class= "action-button" value="Enviar" data-dismiss="modal"/>
                @endsection
                
            </form>
    @endsection
