<?php

namespace App;
use Carbon\Carbon;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipo', 'foto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function setFotoAttribute($foto){
        if (!empty($foto)) {
            $name = Carbon::now()->second.$foto->getClientOriginalName();
            $this->attributes['foto'] = $name;
            \Storage::disk('local')->put($name, \File::get($foto));
        }
        
    }
}
