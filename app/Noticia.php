<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $fillable= ['indicador_id', 'user_id', 'titulo','resumen', 'estado', 'descripcion','origen', 'foto', 'total_visitas' ,'fecha'];
      	protected $primarykey='id';
      
}
