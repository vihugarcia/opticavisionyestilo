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
        Schema::create('lejos', function (Blueprint $table) {
            $table->id();
            $table->float('ejeOD');
            $table->float('ejeOI');
            $table->float('esferaOD');
            $table->float('esferaOI');
            $table->float('cilindroOD');
            $table->float('cilindroOI');            
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
        Schema::dropIfExists('lejos');
    }
};
