@extends('layouts.app')

@section('content')
<div class="container">
    <div class="wrapper">
        <form class="form-signin" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h3 class="form-signin-heading ">
                <a href="/"><img  src="/img/CIIEMP-logo.jpg" style="width:100px;height:100px" alt="CIIEMP" />
                </a>
            <br><br>
                <b style="color:#c7c7c7 !important">Login</b>
            </h3>
            <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <br />
            <label for="password" class="col-md-4 control-label">Contraseña</label>
                <input id="password" type="password" class="form-control" name="password"  required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            <div class="form-group">
                <div class="col-md-6">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar
                        </label>
                    </div>

                </div>
                <div class="col-md-4">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Olvidaste Tu Contraseña?
                    </a>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    
                    
                </div>
            </div>
            <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Iniciar</button>
        </form>
    </div>
</div>
@push ('scripts')
<script type="text/javascript">
    $("#password").password('toggle');
</script>

@endpush 
@endsection
