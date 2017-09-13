<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
     protected $fillable= ['nombres','direccion', 'logo', 'mision', 'vision'];
      	protected $primarykey='id';
}
