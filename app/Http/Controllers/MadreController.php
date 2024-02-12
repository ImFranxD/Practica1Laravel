<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Madre;

class MadreController extends Controller
{
    public function getAll(Request $request){
        $madre = Madre::All();

        return response() -> json([
            'success' => true,
            'message' => 'Obtengo a todas las madres',
            'data' => $madre
        ]);
    }

    public function getById(Request $request, $id){
        $madre = Madre::find($id);
        
        return response() -> json([
            'success' => true,
            'message' => 'Madre obtenida',
            'data' => $madre
        ]);
    }

    public function create(Request $request){
        $madre = Madre::create($request -> validate([
            'nombre' => 'required|max32',
            'edad' => 'required|numeric|max:99',
        ]));

        return response() -> json(
            ['message' => 'Madre creada correctamente'],
            201
        );
    }

    public function delete(Request $request, $id){
        $madre = Madre::find($id) -> delete();

        return response() -> json([
            'success' => true,
            'message' => 'Madre eliminada correctamente',
            'data' => "Madre con el id {$id} eliminado"
        ]);
    }

    public function update(Request $rewquest, $id){
        $madre = Madre::find($id) -> update($request -> validate([
            'id' => $id,
            'nombre' => 'required|max:32',
            'edad' => 'required|numeric|max:99'
        ]));

        if(!$madre){
            return response() -> json(
                ['Error' => 'Usuario no enconctrado'],
                404
            );
        }

        return response() -> json([
            'succeess' => true,
            'message' => 'Madre actualizada',
            'data' => "Madre con el id {$id} actualizada"
        ]);
    }

    public function getAlumno(Request $request, $id){
        $madre = Madre::find($id) -> alumno;
        
        return response() -> json([
            'success' => true,
            'message' => 'Alumno/s de la madre',
            'data' => $madre
        ]);
    }
}
