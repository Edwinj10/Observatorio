<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $fillable= ['nombre', 'indicador_id', 'institucion_id', 'importante', 'descripcion'];
      	protected $primarykey='id';
}
