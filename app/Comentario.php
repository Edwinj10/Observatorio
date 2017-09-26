<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable= ['comentario', 'fecha','publicacion_id', 'user_id', 'estado'];
    protected $primarykey='id';
}
