<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tesis extends Model
{
     protected $fillable= ['id_indicador', 'id_carrera', 'tema', 'introduccion', 'autor', 'metodologia', 'imagen', 'archivo'];
      	protected $primarykey='id';
}
