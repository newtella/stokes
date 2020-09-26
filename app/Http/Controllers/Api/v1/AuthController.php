<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth; 

class AuthController extends Controller
{
    public function login(Request $request) {

        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success =  $user->createToken('authToken')->accessToken; 
            $newToken = bcrypt($success);
            return response()->json([
                'success' => true,
                'token' => $success,
                'user' => $user->name,
                'message' => 'Inicio de Sesion Exitosamente',
            ], 200);
        } 
        else{ 
            
            return response()->json([
                'success' => false,
                'message' => 'Correo o Contraseña Invalidos',
            ], 401); 
        } 
    }

    public function logout(Request $res){
      if (Auth::user()) {
        $user = Auth::user()->token();
        $user->revoke();

        return response()->json([
          'success' => true,
          'message' => 'Logout successfully'
      ]);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Unable to Logout'
        ]);
      }
    }
}
