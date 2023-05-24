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
        Schema::create('cristales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_cristal_id');    
            $table->unsignedBigInteger('tipo_cambio_id');  
            $table->float('dip')->nullable();
            $table->float('altura')->nullable();
            $table->float('ejeOD')->nullable();
            $table->float('ejeOI')->nullable();
            $table->float('esferaOD')->nullable();
            $table->float('esferaOI')->nullable();
            $table->float('cilindroOD')->nullable();
            $table->float('cilindroOI')->nullable();      
            $table->foreign('tipo_cristal_id')->references('id')->on('tipo_cristales')->onDelete('cascade');  
            $table->foreign('tipo_cambio_id')->references('id')->on('tipos_cambio');       
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
        Schema::dropIfExists('cristales');
    }
};
