<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table="pais";
    protected $guarded=['id','created_at','updated_at'];

    //Relacion uno a muchos
    public function ciudades(){
        return $this->hasMany('App\Models\Ciudad');
    }
}
