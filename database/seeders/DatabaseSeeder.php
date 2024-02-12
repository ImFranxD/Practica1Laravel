<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        /*$alumno = new Alumno();

        $alumno -> nombre = "Francisco Rafael";
        $alumno -> telefono = "123456789";
        $alumno -> edad = 21;
        $alumno -> password = "1234asdf";
        $alumno -> email = "prueba@prueba.com";
        $alumno -> sexo = "H";
        $alumno -> created_at = now();
        $alumno -> updated_at = now();

        $alumno -> save();*/

        \App\Models\User::factory(10)->create();
        \App\Models\Madre::factory(10)->create();
        \App\Models\Alumno::factory(30)->create();
        \App\Models\Mascota::factory(30)->create();
    }
}
