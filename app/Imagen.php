<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable= ['user_id', 'titulo','descripcion','foto', 'total_visitas'];
      	protected $primarykey='id';
}
