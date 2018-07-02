<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'company_id',
        'user_id',
        'days',
    ];
    //un proyecto pertenece a muchos usuarios
    public function users(){
        return $this->belongsToMany('App\User');
    }

    //un proyecto pertenece a una compañia
    public function company(){
        return $this->belongsTo('App\Company');
    }

    //tiene una relacion polimorfica con los comentarios
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
