@extends('layouts.app')

@section('content')

                <!-- <div class="panel-heading">Login</div> -->
            <div class="container">
                <div class="form-signin w-100 m-auto">
                <!-- <img class="mb-4" src="img/logo.png" alt="" width="72" height="57"> -->
                <div class="card-header text-center"><h1 style="color:#1A48CD";>Iniciar Sesion</h1></div>
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-floating"{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                            <label for="email">E-Mail Usuario</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-floating"{{ $errors->has('password') ? ' has-error' : '' }}">
                        <input id="password" type="password" class="form-control" name="password" required>
                            <label for="password">Contraseña</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div  class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                        <label class="form-check-label" for="flexCheckDefault">
                            Recuerdame
                        </label>
                        </div>

                        <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                        <!-- <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2023</p> -->

                        <!-- <div  class="btn btn-primary w-100 py-2">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button> -->
                                <a class="btn btn-link btn-sm"" href="{{ route('password.request') }}">
                                    Has olvidado tu contraseña?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
@endsection
