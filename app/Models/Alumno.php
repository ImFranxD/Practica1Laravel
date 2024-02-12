<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'edad',
        'password',
        'sexo',
        'madre_id'
    ];

    public function madre(){
        return $this -> belongsTo(Madre::class);
    }

    public function mascota(){
        return $this->hasOne(Mascota::class);
    }

}