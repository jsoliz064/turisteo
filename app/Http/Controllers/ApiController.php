<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
}
