<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller
{
    public function crearUsuario(Request $request){
        $request -> validate([
            'name' => 'required',
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $user = new User;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = $request -> password;
        $user -> save();

        return response() -> json(
            [
            'success' => true,
            'message' => 'Usuario creado correctamente',
            'data' => $user
            ],201
        );
    }
}
