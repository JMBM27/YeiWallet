@extends("layaouts.plantilla_login_sign")

    @section("title")
        Registarse
    @endsection

    @section("body")

        <form id="msform" class="form-horizontal" method="POST" action="{{ route('sign') }}">
            {{ csrf_field() }}
            <ul id="progressbar">
                <li class="active">Datos de la cuenta</li>
                <li>Datos Personales</li>
                <li>Otros</li>
            </ul>

            <fieldset>
                <p class="formulario_titulo">Registro</p>
                <hr>
                <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" value="{{ old('usuario') }}">

                        @if ($errors->has('usuario'))
                            <span class="help-block">
                                <strong>{{ $errors->first('usuario') }}</strong>
                            </span>
                         @endif
                      </div>
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" placeholder="Correo Electronico" value="{{ old('email') }}">

                         @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                         @endif
                     </div>
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                     </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <input id="password-confirm" type="password" placeholder="Repetir contraseña" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <input type="button" name="next" class="next action-button" value="Siguiente">
            </fieldset>

            <fieldset>
                <p class ="formulario_titulo">Datos Personales<p>
                <hr>
                <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" novalidate>

                        @if ($errors->has('nombre'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nombre') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group{{ $errors->has('apellido') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}">

                        @if ($errors->has('apellido'))
                            <span class="help-block">
                                <strong>{{ $errors->first('apellido') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <select class="form-control" id="pais" name='pais' novalidate>
                            <option selected value="">País</option>
                            <option value="1">Venezuela</option>
                        </select>
                    </div>
                </div>

                <input type="button" name="previous" class="previous action-button" value="Anterior" />
                <input type="button" name="next" class="next action-button" value="Siguiente" />
            </fieldset>
            
            <fieldset>
                <p class ="formulario_titulo">Otros<p>
                <hr>
                <input type="button" name="previous" class="previous action-button" value="Anterior" />
                <button type="submit" class="action-button"> Register</button>
            </fieldset>
        </form>

    @endsection
