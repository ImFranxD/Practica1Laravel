<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login(Request $request){
        $datosUsuario = null;

        $nombre = $request -> input('nombre');
        $password = $request -> input('password');

        if($nombre){
            $datosUsuario = $request -> validate([
                "nombre" => 'required|max255',
                "password" => 'required'
            ]);
        }else{
            return response() -> json([
                'success' => false,
                'message' => 'Error',
                'data' => 'Por favor introduzca los datos correctos'
            ]);
        }

        //Autentificar al usuario
        if(Auth::attempt($datosUsuario)){
            $token = Auth::user() -> createToken("token") -> accessToken;

            return response() -> json([
                'success' => true,
                'message' => 'Este usuario ya habia iniciado sesión',
                'token' => $token,
                'data' => $datosUsuario
            ]);
        }

        //En caso de que el usuario no exista
        return response() -> json([
            'success' => false,
            'message' => 'Usuario incorrecto',
            'data' => $datosUsuario
        ]); 
    }

    public function cerrarSesion(Request $request){
        Auth::user() -> tokens -> each(function($token){
            $token -> delete();
        });

        return response() -> json([
            'success' => true,
            'message' => 'Sesion cerrada correctamente',
            'data' => null
        ]);
    }

    public function informacionUsuario(Request $request){
        /*$datosUsuario = Auth::user();

        return response() -> json([
            'success' => true,
            'message' => 'Usuario encontrado',
            'data' => $datosUsuario
        ]);*/

        if ($request->user()) {
            $datosUsuario = Auth::user();
    
            return response()->json([
                'success' => true,
                'message' => 'Usuario encontrado',
                'data' => $datosUsuario
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No autorizado',
                'data' => null
            ], 401);
        }
    }
}
