<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    //Un rol tiene muchos usuarios
    public function users(){
        return $this->hasMany('App\User');
    }
}
