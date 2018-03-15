@extends("layaouts.plantilla_login_sign")

    @section("title")
        Iniciar Sesión
    @endsection

    @section("body")


            <form id="msform" class="form-horizontal" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <fieldset>
                    <p class="formulario_titulo">Ingresar</p>
                    <hr> <!-- SEPARAR LAS SECCIONES DE LECTURA -->

                    <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                        <label for="usuario" class="col-md-4 control-label">Usuario</label>

                        <div class="col-md-12">
                            <input id="usuario" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" required>

                            @if ($errors->has('usuario'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('usuario') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <input type="submit" class="action-button" value="Ingresar"/>
                    <a href="#"><h6>¿Olvidó su contraseña?</h6></a>
                </fieldset>
            </form>

    @endsection
