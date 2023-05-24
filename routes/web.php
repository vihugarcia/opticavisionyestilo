<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', 'App\Http\Controllers\ProductoController@index');
// <!-- Productos (Lentes) -->

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/productos', 'App\Http\Controllers\ProductoController@search');    
    Route::get('/producto', 'App\Http\Controllers\ProductoController@product'); 
    Route::get('/cristal', 'App\Http\Controllers\CristalController@cristal')->name('cristal'); 

    Route::post('/alcarro', 'App\Http\Controllers\ProductoController@addtocart');
    Route::post('/alcarrocristal', 'App\Http\Controllers\CristalController@addtocart');

    Route::get('/pedido', 'App\Http\Controllers\ProductoController@pedido');
    Route::post('/detalles', 'App\Http\Controllers\ProductoController@detalles');


    //Producto
    Route::get('/agregar', function () {  return view('agregarProductos');}); //colocarla dentro de la controladora

    Route::get('/altaproducto', 'App\Http\Controllers\ProductoController@alta_producto'); //Agregado de productos    
    Route::post('/registrarproducto', 'App\Http\Controllers\ProductoController@registrar_producto');
    Route::get('/editarproductos', 'App\Http\Controllers\ProductoController@editar_productos')->name('editar_productos');
    Route::post('/eliminarproducto', 'App\Http\Controllers\ProductoController@eliminar_producto');
    Route::post('/editarproducto', 'App\Http\Controllers\ProductoController@return_editar_producto');
    Route::post('/editarproductodatos', 'App\Http\Controllers\ProductoController@editar_producto');

    //Cristal
    Route::get('/altacristal', 'App\Http\Controllers\CristalController@alta_cristal');    
    Route::post('/registrarcristal', 'App\Http\Controllers\CristalController@registrar_cristal');
    Route::get('/editarcristales', 'App\Http\Controllers\CristalController@editar_cristales')->name('editar_cristales');
    Route::post('/eliminarcristal', 'App\Http\Controllers\CristalController@eliminar_cristal');
    Route::post('/editarcristal', 'App\Http\Controllers\CristalController@return_editar_cristal');
    Route::post('/editarcristaldatos', 'App\Http\Controllers\CristalController@editar_cristal');


    //Medico
    Route::post('/registrarmedico', 'App\Http\Controllers\MedicoController@registrar_medico');
    Route::get('/editarmedicos', 'App\Http\Controllers\MedicoController@editar_medicos')->name('editar_medicos');
    Route::post('/eliminarmedico', 'App\Http\Controllers\MedicoController@eliminar_medico');
    Route::post('/editarmedico', 'App\Http\Controllers\MedicoController@return_editar_medico');
    Route::post('/editarmedicodatos', 'App\Http\Controllers\MedicoController@editar_medico');

    //Vendedor
    Route::get('/altavendedor', 'App\Http\Controllers\VendedorController@alta_vendedor');
    Route::post('/registrarvendedor', 'App\Http\Controllers\VendedorController@registrar_vendedor');
    Route::get('/editarvendedores', 'App\Http\Controllers\VendedorController@editar_vendedores')->name('editar_vendedores');
    Route::post('/eliminarvendedor', 'App\Http\Controllers\VendedorController@eliminar_vendedor');
    Route::post('/editarvendedor', 'App\Http\Controllers\VendedorController@return_editar_vendedor');
    Route::post('/editarvendedordatos', 'App\Http\Controllers\VendedorController@editar_vendedor');
    
    //Usuario
    Route::get('/altausuario', 'App\Http\Controllers\UsuarioController@alta_usuario');
    Route::post('/registrarusuario', 'App\Http\Controllers\UsuarioController@registrar_usuario');
    Route::get('/editarusuarios', 'App\Http\Controllers\UsuarioController@editar_usuarios')->name('editar_usuarios');
    Route::post('/eliminarusuario', 'App\Http\Controllers\UsuarioController@eliminar_usuario');
    Route::post('/editarusuario', 'App\Http\Controllers\UsuarioController@return_editar_usuario');
    Route::post('/editarusuariodatos', 'App\Http\Controllers\UsuarioController@editar_usuario');

        
    //Receta
    Route::get('/altareceta', 'App\Http\Controllers\RecetaController@alta_receta');
    Route::get('/editarreceta', 'App\Http\Controllers\RecetaController@editar_recetas')->name('editar_receta');
    Route::post('/editarreceta2', 'App\Http\Controllers\RecetaController@return_editar_receta');
    Route::post('/editarrecetadatos', 'App\Http\Controllers\RecetaController@editar_receta');
    Route::get('/obtenerpaciente', 'App\Http\Controllers\RecetaController@obtener_paciente');
    Route::post('/eliminarreceta', 'App\Http\Controllers\RecetaController@eliminar_receta');
    Route::post('/registrarreceta', 'App\Http\Controllers\RecetaController@registrar_receta');
    Route::get('/registrarpaciente', 'App\Http\Controllers\RecetaController@registrar_paciente');
    Route::get('/anular', 'App\Http\Controllers\RecetaController@anular');


    //Acciones del sistema
    Route::get('/accesorios', 'App\Http\Controllers\RecetaController@accesorios');
    Route::get('/verproductorecetado', 'App\Http\Controllers\RecetaController@producto_recetado');

    //MercadoPago Respuesta 
    Route::get('/success', 'App\Http\Controllers\OrdenController@success');
    Route::get('/failure', 'App\Http\Controllers\OrdenController@failure');
    Route::get('/pending', 'App\Http\Controllers\OrdenController@pending');

    //Ordenes
    Route::get('/ordenes', 'App\Http\Controllers\OrdenController@ordenes');
    Route::get('/editarordenes', 'App\Http\Controllers\OrdenController@editar_ordenes')->name('editar_ordenes');
       
    Route::post('/editarorden', 'App\Http\Controllers\OrdenController@return_editar_orden');
    Route::post('/editarordendatos', 'App\Http\Controllers\OrdenController@editar_orden');


    //Configuracion 
    Route::get('/configuracion', 'App\Http\Controllers\ConfiguracionController@configuracion');
    Route::post('/guardartipocambio', 'App\Http\Controllers\ConfiguracionController@guardartipocambio');
    Route::post('/guardarcalibre', 'App\Http\Controllers\ConfiguracionController@guardarcalibre');
    Route::post('/guardarancho', 'App\Http\Controllers\ConfiguracionController@guardarancho');
    Route::post('/guardarlargo', 'App\Http\Controllers\ConfiguracionController@guardarlargo');


});

require __DIR__.'/auth.php';