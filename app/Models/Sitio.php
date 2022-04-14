<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitio extends Model
{
    use HasFactory;
    protected $table="sitios";
    protected $guarded=['id','created_at','updated_at'];

     //relacion uno a muchos inversa
    public function ciudad(){
        return $this->belongsTo('App\Models\Ciudad');
    }
}
