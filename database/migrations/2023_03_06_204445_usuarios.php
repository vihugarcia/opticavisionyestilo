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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');           
            $table->unsignedBigInteger('medico_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->foreign('medico_id')->references('id')->on('medicos')->onDelete('cascade');                            
            $table->string('img', 255)->nullable();   
            $table->integer('dni')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('password_user')->nullable();
            $table->string('afiliado')->nullable();
            $table->string('obra_social')->nullable();
            $table->string('sexo',1)->nullable();
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
        Schema::dropIfExists('usuarios');
    }
};
