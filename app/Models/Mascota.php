<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'edad',
        'raza',
        'alumno_id',
    ];

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }
}
