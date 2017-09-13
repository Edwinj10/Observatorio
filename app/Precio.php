<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio extends Model
{
    protected $fillable= ['indicador_id', 'precio'];
      	protected $primarykey='id';
}
