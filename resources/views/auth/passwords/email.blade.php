@extends('layouts.app')
@section('content')
<div class="container">
    <div class="wrapper">
        <form class="form-signin" role="form" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <h3 class="form-signin-heading ">
                <a href="/"><img  src="/img/CIIEMP-logo.jpg" style="width:100px;height:100px" alt="CIIEMP" />
                </a>
                <br><br>
                <b style="color:#c7c7c7 !important">Restablecer Contraseña</b>
            </h3>
            <h4 class="text-center">¿Olvidaste tu Contraseña?</h4>
            <br>
            <p><b>Escribe tu email y se te enviará un enlace para restablecer tu contraseña </b></p>
            <div class="form-group">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <label for="email" class="col-md-12 control-label">E-Mail</label>
            <!-- <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required> -->
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            <div class="form-group">
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group">
                <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
            </div>
        </form>
    </div>
</div>
@endsection
