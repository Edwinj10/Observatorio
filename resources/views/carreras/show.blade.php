@extends ('layouts.principal')
@section ('content')
  @if(Session::has('message'))



<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  {{Session::get('message')}}
</div>
@endif
 
    
     <div class="row">
       <div class="col-lg-4">
         <div class="avatar">
                    <img alt="" src="{{asset('imagenes/tesis/'.$tesis->imagen)}}" height="118px" width="118px">
                </div>
       </div>
       <div class="col-lg-4">
         
       <div class="title">
           <h1>Tema:  {{ $tesis->tema}}</h1>
          
        </div>
        <h2>Autor(es):  {{ $tesis->autor}}</h2>
         
       </div>


 
      <div class="col-lg-4 col-md-8 col-sm-8 col-xs-12">
          <h3><a href="/tesis/create"><button class="btn btn-success">Crear nuevo</button></a></h3>
            
      </div>
  

     </div>
     <div class="row">
     
       <div class="col-lg-12">
          <div class="desc">Introducción: <br>
                    {{ $tesis->introduccion}}


                    </div>

       </div>

     </div>
     
               <div class="row">
                 <div class="col-lg-12">
                   
                     <embed src="{{asset('archivos/tesis/'.$tesis->archivo)}}" type="application/pdf" width="100%" height="600"></embed>
                    
                 </div>

               </div> 
                

                   
                   
                    


                      
                
      

@endsection
