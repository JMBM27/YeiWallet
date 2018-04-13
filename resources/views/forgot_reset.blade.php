@extends("layaouts.plantilla_login_sign")

    @section("title")
       Recuperar su Contraseña
    @endsection


    @section("body")
            <form id="msform" class="form-horizontal" method="POST" action="{{ route('password.request') }} ">
                {{ csrf_field() }}
                <fieldset>
                    <p class="formulario_titulo">Cambiar Contraseña</p>
                    <hr>
                    
                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email" type="email"  placeholder="Ingrese su correo electrónico" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" type="password" placeholder="Contraseña" class="form-control" name="password">

                            @if ($errors->has('password'))
                                <div style="display: block;" id="error_password">
                                    {{ $errors->first('password') }}
                                </div>
                            @else
                                <div id="error_password">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" placeholder="Repetir contraseña" class="form-control" name="password_confirmation">
                        </div>
                    </div>
                    <input type="submit" name="next" class="action-button" value="Guardar"/>
                </fieldset>
            </form>
    @endsection
