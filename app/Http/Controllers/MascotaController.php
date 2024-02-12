<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mascota;

class MascotaController extends Controller
{
    public function getAll(Request $request){
        $mascotas = Mascota::All();

        return response()->json([
            'success' => true,
            'message' => 'Obtengo todas las mascotas',
            'data' => $mascotas,
        ]);
    }

    public function getById(Request $request, $id){
        $mascotas = Mascota::find($id);
        
        return response()->json(
            [
                'success' => true,
                'message' => 'Mascota obtenida',
                'data' => $mascotas
            ]
        );
    }

    public function create(Request $request){

        $mascotas = Mascota::create($request->validate([
            'nombre' => 'required|max:32',
            'edad' => 'required|numeric|max:99',
            'raza' => 'required|max:32',
            'alumno_id' => 'required|max:20',
        ]));

        return response()->json(
            ['message' => "Mascota creada correctamente"],
            201
        );
    }

    public function delete(Request $request, $id){
        $mascotas = Mascota::find($id)->delete();
        
        return response()->json(
            [
                'success' => true,
                'message' => 'Eliminado',
                'data' => "Mascota con id {$id} eliminado"
            ]
        );
    }

    public function update(Request $request, $id){
        $mascotas = Mascota::find($id)->update($request->validate([
            'id' => $id,
            'nombre' => 'required|max:32',
            'edad' => 'required|numeric|max:99',
            'raza' => 'required|max:32',
            'alumno_id' => 'required|max:20',
        ]));

        if (!$mascotas) {
            return response()->json(
                ['ERROR' => 'Usuario no encontrado'],
                404
            );
        }

        return response()->json([
            'success' => true,
            'message' => 'Actualizado',
            'data' => "Mascota con id {$id} actualizado"
        ]);
    }

    public function getAlumno(Request $request, $id) {
        $alumno = Mascota::find($id)->alumno;

        return response()->json(
            [
                'success' => true,
                'message' => 'Alumno de la mascota',
                'data' => $alumno
            ]
        );
    }
}
