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
                        <div class="col-md-12">
                            <input id="usuario" type="text" placeholder="Usuario" class="form-control" name="usuario" value="{{ old('usuario') }}" required>

                            @if ($errors->has('usuario'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('usuario') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <input type="submit" class="action-button" value="Ingresar"/>
                    <a href="{{ route('password.request') }}"><h6>¿Olvidó su contraseña?</h6></a>
                </fieldset>
            </form>

    @endsection
