<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madre extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'edad'
    ];

    public function alumno(){
        return $this -> hasMany(Alumno::class);
    }
}
