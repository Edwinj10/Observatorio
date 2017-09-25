@extends ('layouts.principal')
@section ('content')
  @if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
  
    <link rel="stylesheet" href="{{asset('css/contacto.css')}}">
    <!-- <link href="https://fonts.googleapis.com/css?family=Oswald:700|Patua+One|Roboto+Condensed:700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> -->
</head>
<body>
  <section id="contact" class="content-section text-center">
        <div class="contact-section">
            <div class="container">
              <h3>Póngase en contacto con Nosotros</h3>
              <!-- <p>Feel free to shout us by feeling the contact form or visiting our social network sites like Fackebook,Whatsapp,Twitter.</p> -->
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                {!! Form::open(['route' => 'mail.store' , 'method' =>'POST']) !!}
                  <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputName2">Nombre:</label>
                      <input type="text" class="form-control" name="name" id="exampleInputName2" placeholder="Juan">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail2">Correo:</label>
                      <input type="email" class="form-control" name="email" id="exampleInputEmail2" placeholder="juan@example.com">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputText">Mensaje:</label>
                     <textarea  class="form-control" placeholder="Description" name="descripcion"></textarea> 
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                  </div>
                  {!!Form::close()!!}

                  <hr>
                    <h3>Siguenos en Nuestras Redes Sociales</h3>
                  <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-youtube-play fa-2x"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter fa-2x"></i></a> 
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-youtube-play fa-2x"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </section>
    
</body>
</html>
@stop

