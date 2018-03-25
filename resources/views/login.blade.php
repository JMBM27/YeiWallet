@extends("layaouts.plantilla_login_sign")

    @section("title")
        Iniciar Sesión
    @endsection

    @section("body")


            <form id="msform" class="form-horizontal" method="POST" action="{{ route('login') }}" autocomplete ="off">
                {{ csrf_field() }}
                <fieldset>
                    <p class="formulario_titulo">Ingresar</p>
                    <hr> <!-- SEPARAR LAS SECCIONES DE LECTURA -->

                    <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="usuario" type="text" placeholder="Usuario" class="form-control" name="usuario" value="{{ old('usuario') }}">

                            @if ($errors->has('usuario'))
                                <div class="error">
                                    {{ $errors->first('usuario') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Password" class="form-control" name="password">

                            @if ($errors->has('password'))
                                  <div class="error">
                                    {{ $errors->first('password') }}
                                  </div>
                            @endif
                        </div>
                    </div>
                    
                    <input type="submit" class="action-button" value="Ingresar"/>
                    <a href="{{ route('password.request') }}"><h6>¿Olvidó su contraseña?</h6></a>
                </fieldset>
            </form>

    @endsection
