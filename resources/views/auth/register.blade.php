@extends('layouts.app')
@section('content')
<div class="container">
    <div class="wrapper">
        {!!Form::open(['route'=>'register', 'method'=>'POST', 'files' =>true, 'class'=>'form-signin'])!!}
                        {{ csrf_field() }}
        <h3 class="form-signin-heading ">
            <a href="/"><img  src="/img/CIIEMP-logo.jpg" style="width:100px;height:100px" alt="CIIEMP" />
            </a>
            <br><br>
            <b style="color:#c7c7c7 !important">Registrame</b>
        </h3>
        <label for="name" class="col-md-12 control-label">Nombre de Usuario</label>
        <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
        @if ($errors->has('name'))
        <span class="help-block">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
        @endif
        <br />
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
        <br />
        <label for="password" class="col-md-8 control-label">Confirmar Contraseña</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  required>
        <br>
        <div class="form-group" hidden="">
            {!!Form::label('','Tipo de Usuario:')!!}

            <select class="form-control" name="tipo" id="option">
                <option value="Usuario">Usuario</option>
            </select>
        </div>
        <div class="form-group">
            <div class="file">
                <label for="password" class="col-md-8 control-label">Foto de perfil</label>
                <input type="file" id="addfotoarea" name="foto" class="form-control">
                <output id="list"></output>
                @if ($errors->has('foto'))
                <span class="help-block">
                    <strong>{{ $errors->first('foto') }}</strong>
                </span>
                @endif
            </div>
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="Submit" value="Login" type="Submit">Registrarme</button>
    </form>
</div>

</div>

@push ('scripts')
<script type="text/javascript">
    $("#password").password('toggle');
</script>

@endpush 
@endsection
