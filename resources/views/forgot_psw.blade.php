@extends("layaouts.plantilla_login_sign")

    @section("title")
       Recuperar su Contraseña
    @endsection


    @section("body")
            <form id="msform" class="form-horizontal" method="POST" action="{{ route('password.email') }} ">
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
                            <input id="email" type="email" placeholder="Ingrese su correo electrónico" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
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
