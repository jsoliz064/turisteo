<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
     protected $table="ciudads";
    protected $guarded=['id','created_at','updated_at'];

    //relacion uno a muchos inversa
    public function pais(){
        return $this->belongsTo('App\Models\Pais');
    }
    //Relacion uno a muchos
    public function users(){
        return $this->hasMany('App\Models\User');
    }
    //Relacion uno a muchos
    public function sitios(){
        return $this->hasMany('App\Models\Pais');
    }
}
