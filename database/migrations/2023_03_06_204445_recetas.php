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
        Schema::create('recetas', function (Blueprint $table) {
            $table->id();
            $table->string('sexo',1)->comment("M,F,U")->nullable(); ;
            $table->boolean('plaquetas_ajustables')->nullable(); ;
            $table->unsignedBigInteger('medico_id');           
            $table->unsignedBigInteger('paciente_id');      
            $table->unsignedBigInteger('distancia_apto_id')->nullable();    
            $table->unsignedBigInteger('forma_id')->nullable();        
            $table->unsignedBigInteger('cerca_id')->nullable();    
            $table->unsignedBigInteger('lejos_id')->nullable();        
            $table->string('altura_puente')->nullable(); 
            $table->string('largo_patillas')->nullable(); 
            $table->string('ancho_cara')->nullable(); 
            $table->float('distancia_nasopupilar_derecha')->nullable();
            $table->float('distancia_nasopupilar_izquierda')->nullable();
            $table->float('distancia_interpupilar')->nullable();                               
            $table->string('distancia')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('tipo')->nullable();      
            $table->boolean('usada')->nullable();     
                     
            
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->foreign('paciente_id')->references('id')->on('usuarios');
            $table->foreign('distancia_apto_id')->references('id')->on('distancias_apto');
            $table->foreign('forma_id')->references('id')->on('formas_cara');   
            $table->foreign('cerca_id')->references('id')->on('cerca');  
            $table->foreign('lejos_id')->references('id')->on('lejos');         
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
        Schema::dropIfExists('recetas');
    }
};
