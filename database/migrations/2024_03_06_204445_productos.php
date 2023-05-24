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
       
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_producto')->nulleable();            
            $table->string('nombre_base', 255);
            $table->string('codigo', 50)->nullable()->comment("Codigo que tiene en la patilla el lente");
            $table->string('nombre', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->boolean('nino')->default(0);
            $table->boolean('altas_graduaciones')->nullable()->default(0);
            $table->integer('ancho_cara')->nullable()->default(0);
            $table->boolean('plaquetas_ajustables')->nullable()->default(0);          
            $table->integer('altura_puente')->nullable();
            $table->float('calibre')->nullable();
            $table->string('largo_patillas')->nullable();
            $table->string('sexo', 1)->nullable()->comment("M,F,U");
            $table->integer('distancia_apto_id')->nullable();
            $table->integer('rango_etario_desde')->nullable();
            $table->integer('rango_etario_hasta')->nullable();
            $table->integer('rango_etario_desde_meses')->nullable();
            $table->integer('rango_etario_hasta_meses')->nullable();
            $table->decimal('costo',12,2)->nullable();
            $table->decimal('impuesto',12,2)->nullable();
            $table->decimal('ganancia',12,2)->nullable();
            $table->decimal('monto',12,2);
            $table->decimal('distancia_interpupilar',12,2)->nullable();
            $table->decimal('distancia_nasopupilar',12,2)->nullable();
            $table->decimal('monto_descuento',12,2)->nullable();
            $table->boolean('descuento')->default(0);
            $table->integer('descuento_porcentaje')->nullable();
            $table->boolean('destacado')->default(0);
            $table->integer('stock')->default(0);
            $table->integer('visitas')->default(0);
            $table->integer('proveedor_id')->nullable();
            $table->integer('orden')->nullable();
            $table->boolean('habilitado')->default(1);
            $table->integer('created_user_id')->nullable();
            $table->integer('updated_user_id')->nullable();
            $table->integer('deleted_user_id')->nullable();
            $table->string('img1', 255)->nullable();
            $table->string('img2', 255)->nullable();
            $table->string('img3', 255)->nullable();
            $table->string('img4', 255)->nullable();

            $table->unsignedBigInteger('marca_id');    
            $table->unsignedBigInteger('tipo_cambio_id');    
            $table->unsignedBigInteger('material_id');    
            $table->unsignedBigInteger('forma_armazon_id');    
            $table->unsignedBigInteger('color_id');    
            $table->unsignedBigInteger('categoria_id');               

            $table->foreign('marca_id')->references('id')->on('marcas');           
            $table->foreign('tipo_cambio_id')->references('id')->on('tipos_cambio');      
            $table->foreign('material_id')->references('id')->on('materiales');           
            $table->foreign('forma_armazon_id')->references('id')->on('formas_armazon');           
            $table->foreign('color_id')->references('id')->on('colores');           
            $table->foreign('categoria_id')->references('id')->on('categorias');          

            $table->softDeletes();
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
        Schema::dropIfExists('productos');
    }
};
