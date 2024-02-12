<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 32)->nullable(false);
            $table->string('telefono', 16)->nullable();
            $table->integer('edad');
            $table->string('password', 64)->nullable(false);
            $table->string('sexo');
            $table->unsignedInteger('madre_id');
            $table->foreign('madre_id')->references('id')->on('madres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('alumnos');
    }
};
