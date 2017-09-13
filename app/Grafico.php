<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grafico extends Model
{
   protected $fillable= ['nombre', 'precio', 'venta'];
      	protected $primarykey='id';
}