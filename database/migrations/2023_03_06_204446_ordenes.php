<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medico_id');  
            $table->unsignedBigInteger('paciente_id');
            $table->unsignedBigInteger('receta_id');                                           
            $table->foreign('receta_id')->references('id')->on('recetas');
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('paciente_id')->references('id')->on('usuarios');
            $table->string('direccion');
            $table->float('monto');    
            $table->string('estado');  
            $table->string('preference_id')->nullable();  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes');
    }
};
