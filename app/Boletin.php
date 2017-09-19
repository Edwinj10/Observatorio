<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
     protected $fillable= ['url', 'dia', 'mes', 'anio', 'user_id'];
      	protected $primarykey='id';
}
