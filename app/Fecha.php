<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fecha extends Model
{
    protected $fillable= ['dia', 'mes', 'anio'];
      	protected $primarykey='id';
}
