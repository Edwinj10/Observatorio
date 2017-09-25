<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Indicador extends Model
{
    protected $fillable= ['tipo', 'imagen'];
      	protected $primarykey='id';
}
