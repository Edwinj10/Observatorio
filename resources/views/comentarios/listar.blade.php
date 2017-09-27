<section class="row-section">
  <div class="container">
    <div class="row">
      <h2 class="text-center"><span>Comentarios</span></h2>
    </div>
    <div class="col-md-8 row-block">
      <ul id="sortable">
        @foreach ($comentario as $co)
          <li>
            <div class="media">
              <div class="media-left align-self-center">
                <img class="rounded-circle" id="avatar" src="/imagenes/usuarios/{{ $co->foto }}">
              </div>
              <div class="media-body">
                <h4>{{$co->name}}</h4>
                <h4 id="fecha">Fecha: {{$co->fecha}} </h4>
                <p>{{$co->comentario}}</p>
              </div>
            </div>
                @endforeach
          </li>
      </ul>
    </div>
  </div>
</section>