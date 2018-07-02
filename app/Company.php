<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'user_id',
    ];

    //una compañia pertenece a un usuario
    public function user(){
        return $this->belongsTo('App\User');
    }

    //una compañia tiene muchos proyectos
    public function projects(){
    	return $this->hasMany('App\Project');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
