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
            </form>
    @endsection
