<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    public function login(Request $request){
        $user=User::where('email',$request->email)->get()->first();        
        if ($user!=null){
            if (Hash::check($request->password, $user->password)){
                return $user;
            }else{
                return "contraseña incorrecto";
            }
        }else{
            return "email incorrecto";
        }  
    }

    public function register(Request $request){
        $email=User::where('email',$request->email)->get()->first();
        if ($email==null){
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'ciudad_id' =>1,
            ]);
            return "usuario registrado";
        }else{
            return "email ya registrado";
        }
    }

    public function users(){
        $users=DB::table('users')
        ->join('ciudads','ciudads.id', '=','users.ciudad_id')
        ->join('pais','pais.id','=','ciudads.pais_id')
        ->select('users.id','users.name','users.email','ciudads.nombre AS ciudad_nombre','pais.nombre AS pais_nombre')
        ->get();
        return $users;
    }

}
