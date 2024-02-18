<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function getAll(Request $request){
        $alumnos = Alumno::All();
       
        return response() -> json([
            'succes' => true,
            'message' => 'Todos los alumnos obtenidos',
            'data' => $alumnos
        ]);
    }

    public function getAlumnoByID(Request $request, $id){
        $alumnos = Alumno::find($id);
        
        echo $alumnos;
        exit();
        if (!$alumnos) {
            return response()->json(['error' => 'Alumno no encontrado'], 404);
        }

        return response() -> json([
            'succes' => true,
            'message' => 'Alumno encontrado',
            'data' => $alumnos
        ]);
    }

    public function create(Request $request){
        $alumnos = Alumno::create($request -> validate([
            'nombre' => 'required|max:32',
            'telefono' => 'max:16',
            'edad' => 'required|max:11',
            'password' => 'required|max:64',
            'sexo' => 'required|max:255',
        ]));

        return response() -> json(
            ['message' => 'Alumno creado correctamente'],
            201
        );
    }

    public function delete(Request $request, $id){
        $alumno = Alumno::find($id) -> delete();
        
        return response() -> json([
            'success' => true,
            'message' => 'Alumno eliminado correctamente',
            'data' => "Alumno con el id {$id} eliminado"
        ]);
    }

    public function update(Request $request, $id){
        $user = Alumno::find($id) -> update($request -> validate([
            'id' => $id,
            'nombre' => 'required|max:32',
            'telefono' => 'max:16',
            'edad' => 'required|max:11',
            'password' => 'required|max:64',
            'sexo' => 'required|max:255',
        ]));

        if(!$user){
            return response() -> json(
                ['Error' => 'Alumno no encontrado'],
                404,
            );
        }

        return response() -> json([
            'succes' => true,
            'message' => 'Actualizado',
            'data' => "Alumno con el id {$id} actualizado correctamente"
        ]);
    }

    public function getMadre(Request $request, $id) {
        $madre = Alumno::find($id)->madre;

        return response()->json(
            [
                'success' => true,
                'message' => 'Madre del alumno',
                'data' => $madre
            ]
        );
    }

    public function getMascota(Request $request, $id) {
        $mascota = Alumno::find($id)->mascota;

        return response()->json(
            [
                'success' => true,
                'message' => 'Productos del atleta',
                'data' => $mascota
            ]
        );
    }

}
