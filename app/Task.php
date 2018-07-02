<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name', 
        'project_id', 
        'user_id',
        'days',
        'hours',
        'company_id',  
    ];
    //Aqui podemos ver que una tarea pertenece a un projecto, a un usuario y a una compañia porque esta el ID
    //
    //una tarea pertenece a 
    /*public function user(){
        return $this->belongsTo('App\User');
    }*/

    //una tarea pertenece a un proyecto
    public function project(){
        return $this->belongsTo('App\Project');
    }

    //una tarea pertecene a una compañia
    public function company(){
        return $this->belongsTo('App\Company');
    }

    //una tarea pertenece a muchos usuarios
    public function users(){
        return $this->belongsToMany('App\User');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
