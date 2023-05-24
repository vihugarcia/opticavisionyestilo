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
        Schema::create('cristal_orden', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cristal_id');  
            $table->unsignedBigInteger('orden_id');
            $table->foreign('cristal_id')->references('id')->on('cristales');
            $table->foreign('orden_id')->references('id')->on('ordenes');                           
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
        Schema::dropIfExists('cristal_orden');
    }
};
