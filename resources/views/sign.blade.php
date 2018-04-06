@extends("layaouts.plantilla_login_sign")

    @section("title")
        Registarse
    @endsection

    @section("body")

        <form id="msform" class="form-horizontal" method="POST" action="{{ route('sign') }}" autocomplete="off" onsubmit="return validar_datos_personales();">
            {{ csrf_field() }}
            <ul id="progressbar">
                <li class="active">Datos de la cuenta</li>
                <li>Datos Personales</li>
            </ul>

            <fieldset>
               <p class="formulario_titulo">Registro</p>
                <hr>
                <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" onclick="eliminar_error(1);" value="{{ old('usuario') }}">
                        <div id="error_usuario">
                        @if ($errors->has('usuario'))
                                {{ $errors->first('usuario') }}
                         @endif
                        </div>
                      </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Correo Electronico" onclick="eliminar_error(2);" value="{{ old('email') }}">
                        <div id="error_email">
                                @if ($errors->has('email'))
                                    {{ $errors->first('email') }}
                                @endif
                        </div>
                        </div>
                     </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password" onclick="eliminar_error(3);">
                        <div id="error_password">
                            @if ($errors->has('password'))
                                {{ $errors->first('password') }}
                            @endif
                        </div>
                     </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input id="password-confirm" type="password" placeholder="Repetir contraseña" class="form-control" name="password_confirmation" onclick="eliminar_error(4);">
                        <div id="error_password_2"></div>
                    </div>
                </div>

                <input type="button" name="next" class="next action-button" value="Siguiente">
           </fieldset>

            <fieldset>
                <p class ="formulario_titulo">Datos Personales<p>
                <hr>
                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre" onclick="eliminar_error(5);" value="{{ old('nombre') }}" novalidate>
                            <div id="error_nombre">
                                @if ($errors->has('nombre'))
                                    {{ $errors->first('nombre') }}
                                @endif
                            </div>
                    </div>
                </div>
                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Apellido" onclick="eliminar_error(6);" value="{{ old('apellido') }}">
                             <div id="error_apellido">
                                @if ($errors->has('apellido'))
                                    {{ $errors->first('apellido') }}
                                @endif
                             </div>
                    </div>
                </div>

                    <div class="div_fech_nac">
                        <p>Fecha de nacimiento</p>
                        <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input id="fecha_nacimiento" class="form-control" size="16" type="text" value="" readonly onclick="eliminar_error(7);">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-remove"><img src="Imagenes/cancelar.svg" width="15"></span></span>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"><img src="Imagenes/calendario.svg" width="20"></span></span>
                        </div>
                        <div id="error_f_nacimiento"></div>
                    </div>

                <div class="div_terminos">
                    <input id="terminos_checkbox" type="checkbox"/>
                    Acepto los <a data-toggle="modal" href="#ventana_codigo" aria-controls="#cod">términos y condiciones</a> del sitio web
                </div>
                <div id="error_checkbox"></div>

                <input type="button" name="previous" class="previous action-button" value="Anterior" />
                <input type="submit" class="action-button" value="Registrarse"/>
            </fieldset>

            <fieldset>
                @section('titulo_ventana')
                    <div class="formulario_titulo">
                        Términos y condiciones
                    </div>
                @endsection

                @section('body_ventana')
                    <div class='div_terminos_texto'>
                        <iframe class="div_terminos_texto" src="https://docs.google.com/document/d/1GBXEtEc_kkji8hD3Ho4jGLDKVbbmqNdWZe27MX6366k/pub?embedded=true">
                        </iframe>
                    </div>
                @endsection

                @section('footer_ventana')
                @endsection

            </fieldset>
        </form>


    @endsection
