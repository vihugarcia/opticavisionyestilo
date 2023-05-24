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
        Schema::create('tipo_cristales', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->string('variante');
            $table->string('tipo');
            $table->text('descripcion');
            $table->float('esfera_desde');
            $table->float('esfera_hasta');
            $table->float('cilindro_desde');
            $table->float('cilindro_hasta');
            $table->float('eje_desde');
            $table->float('eje_hasta');
            $table->boolean('habilitado');
            $table->unsignedBigInteger('categoria_id'); 
            $table->foreign('categoria_id')->references('id')->on('categorias');   

            $table->float('monto');                                 
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
        Schema::dropIfExists('tipo_cristales');
    }
};
