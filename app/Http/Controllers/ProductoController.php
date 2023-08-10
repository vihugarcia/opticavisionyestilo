<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\Color;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Forma_Armazon;
use App\Models\Material;
use App\Models\Distancia_Apto;
use App\Models\Tipo_Cambio;
use App\Models\Cristal;
use App\Models\Tipo_Cristal;
use App\Models\Orden;
use App\Models\Receta;
use App\Models\Producto_Orden;
use App\Models\Cristal_Orden;


class ProductoController extends Controller
{

	public function index()
	{
		$productos = Producto::orderBy('created_at', 'desc')->get();		
		$tipo_cambio = Tipo_Cambio::all();		
		return view('welcome', ['productos' => $productos, 'tipo_cambio' => $tipo_cambio]);
	}

	public function search(Request $request){
		//$category_id = $request['category_id'];
		$productos = Producto::orderBy('created_at', 'desc')->get();
		//$category_name = Category::where('id', '=', $category_id)->get();
		return view('productos', ['productos' => $productos, /*'category_name' => $category_name*/]);
	}

	public function pedido(){						
		return view('pedido');
	}

	public function detalles(Request $request){		
		$carrito = session()->get('carrito');				
		$receta = Receta::find($carrito->receta_id);
		//$usuario = Usuario::find(Auth::user()->usuario->id);
		$user = User::find(Auth::user()->id);
		$user->telefono = $request->telefono; 
		$user->celular = $request->telefono; 
		$user->direccion = $request->direccion; 
		$user->save();


		$orden = new Orden; 
		$orden->medico_id = $receta->medico_id;
		$orden->paciente_id = $receta->paciente_id;
		$orden->receta_id = $receta->id; 
		$orden->direccion = $request->direccion; 	
		$orden->monto = $request->total; 
		$orden->estado = "Pendiente";
		$orden->save();
			
		foreach($carrito->products as $producto){
			$producto_orden = new Producto_Orden; 
			$producto_orden->producto_id = $producto->id; 
			$producto_orden->orden_id = $orden->id; 
			$producto_orden->save();
		}

		foreach($carrito->cristales as $cristal){
			$cristal_orden = new Cristal_Orden; 
			$cristal_orden->cristal_id = $cristal->id; 
			$cristal_orden->orden_id = $orden->id; 
			$cristal_orden->save();
		}			
		
		return view('detalles', ['orden' => $orden]);						
	}

	public function addtocart(Request $request)
	{
		$product = Producto::find($request['product_id']);	
		$receta = Receta::find($request->receta_id);
		$carrito = new Carrito;		

		if(session()->has('carrito')){
			$carrito = session()->get('carrito');
			$arrayProducts = $carrito->products;			
		}else
			$arrayProducts = [];	

		array_push($arrayProducts, $product);		
		$carrito->products = $arrayProducts;
		$carrito->receta_id = $receta->id;
		session()->put('carrito', $carrito);		

		if($product->tipo_producto == 'Accesorio'){
			return view('pedido');
		}
					

		if($receta->distancia_apto_id == 2 || $product->distancia_apto_id == 2 || $product->distancia_apto_id == 4){	

			if($request->tipo_lente){
				if($request->tipo_lente == 'desol'){
					return view('pedido');
				}
			}		
			
			if($request->degresivos == "si"){			
				if($receta->cerca){
					
					$cristales = Tipo_Cristal::where('esfera_desde', '<=', $receta->cerca->esferaOD)->where('esfera_hasta', '>=', $receta->cerca->esferaOD)
											->where('cilindro_desde', '<=', $receta->cerca->cilindroOD)->where('cilindro_hasta', '>=', $receta->cerca->cilindroOD)
											->where('eje_desde', '<=', $receta->cerca->ejeOD)->where('eje_hasta', '>=', $receta->cerca->ejeOD)
											->where('tipo', 'degresivo')
											->where('categoria_id', 1)
											->get();

					return view('cristales', ['productos' => $cristales]);
		
				}
			}else{
				if($receta->cerca){
					$cristales = Tipo_Cristal::where('esfera_desde', '<=', $receta->cerca->esferaOD)->where('esfera_hasta', '>=', $receta->cerca->esferaOD)
												->where('cilindro_desde', '<=', $receta->cerca->cilindroOD)->where('cilindro_hasta', '>=', $receta->cerca->cilindroOD)
												->where('eje_desde', '<=', $receta->cerca->ejeOD)->where('eje_hasta', '>=', $receta->cerca->ejeOD)
												->where('tipo', 'monofocal')
												->where('categoria_id', 1)
												->get();

						return view('cristales', ['productos' => $cristales]);
				}
			}														
		}

		if($receta->distancia_apto_id == 1 || $product->distancia_apto_id == 1 || $product->distancia_apto_id == 4){
			if($request->tipo_lente){ 
				if($request->tipo_lente == 'desol'){
					if($receta->lejos){		

						$cristales = Tipo_Cristal::where('esfera_desde', '<=', $receta->cerca->esferaOD)->where('esfera_hasta', '>=', $receta->cerca->esferaOD)
														->where('cilindro_desde', '<=', $receta->cerca->cilindroOD)->where('cilindro_hasta', '>=', $receta->cerca->cilindroOD)
														->where('eje_desde', '<=', $receta->cerca->ejeOD)->where('eje_hasta', '>=', $receta->cerca->ejeOD)
														->where('tipo', 'monofocal')
														->where('categoria_id', 2)
														->get();
						
						return view('cristales', ['productos' => $cristales]);		
					}
				}
			}

			if($request->tipo_lente == 'clipOn'){
				if($receta->lejos){		

					$cristales = Tipo_Cristal::where('esfera_desde', '<=', $receta->cerca->esferaOD)->where('esfera_hasta', '>=', $receta->cerca->esferaOD)
													->where('cilindro_desde', '<=', $receta->cerca->cilindroOD)->where('cilindro_hasta', '>=', $receta->cerca->cilindroOD)
													->where('eje_desde', '<=', $receta->cerca->ejeOD)->where('eje_hasta', '>=', $receta->cerca->ejeOD)
													->where('tipo', 'monofocal')
													->where('categoria_id', 3)
													->get();
					
					return view('cristales', ['productos' => $cristales]);		
				}
			}

			if($receta->lejos){		

				$cristales = Tipo_Cristal::where('esfera_desde', '<=', $receta->cerca->esferaOD)->where('esfera_hasta', '>=', $receta->cerca->esferaOD)
												->where('cilindro_desde', '<=', $receta->cerca->cilindroOD)->where('cilindro_hasta', '>=', $receta->cerca->cilindroOD)
												->where('eje_desde', '<=', $receta->cerca->ejeOD)->where('eje_hasta', '>=', $receta->cerca->ejeOD)
												->where('tipo', 'monofocal')
												->where('categoria_id', '=', 1)
												->get();
				
				return view('cristales', ['productos' => $cristales]);		
			}
			
		}
	}

		

	public function deletetocart(Request $request)
	{
		$product = Product::find($request['product_id']);	
		$product->talle = $request['talle'];
		$product->color = $request['color'];		
		$carrito = new Carrito;			
		if(session()->has('carrito')){
			$carrito = session()->get('carrito');
			$arrayProducts = $carrito->products;
		}else{
			$arrayProducts = [];
		}					
		for($i=0;$i<count($arrayProducts);$i++){						
				if($arrayProducts[$i]->name == $product->name){							
					//return $product;
					unset($arrayProducts[$i]);
					$arrayProducts = array_values($arrayProducts);
					break; 
				}							
		}								
		$carrito->products = $arrayProducts;
		session()->put('carrito', $carrito);								
		return redirect()->back();
	}

	public function product(Request $request)
	{
		$producto = Producto::find($request['product_id']);
		$productos = Producto::where('nombre', '=', $producto->nombre)->distinct()->get();
		$receta = Receta::find($request->receta_id);
		return view('producto', ['producto' => $producto, 'productos' => $productos, 'receta' => $receta]);
	}

	public function editar_producto(Request $request)
    {
        $producto = Producto::find($request->id);       
        
        if(!empty($request['name'])){
            $producto->nombre = $request['name'];
            $producto->save();
        }

        if(!empty($request['nombre_base'])){
            $producto->nombre_base = $request['nombre_base'];
            $producto->save();
        }

		if(!empty($request['categoria_id'])){
            $producto->categoria_id = $request['categoria_id'];
            $producto->save();
        }

		if(!empty($request['color_id'])){
            $producto->color_id = $request['color_id'];
            $producto->save();
        }

		if(!empty($request['marca_id'])){
            $producto->marca_id = $request['marca_id'];
            $producto->save();
        }

		if(!empty($request['forma_id'])){
            $producto->forma_armazon_id = $request['forma_id'];
            $producto->save();
        }

		if(!empty($request['material_id'])){
            $producto->material_id = $request['material_id'];
            $producto->save();
        }

		if(!empty($request['distancia_id'])){
            $producto->distancia_apto_id = $request['distancia_id'];
            $producto->save();
        }

		if(!empty($request['codigo'])){
            $producto->codigo = $request['codigo'];
            $producto->save();
        }
		if(!empty($request['descripcion'])){
            $producto->descripcion = $request['descripcion'];
            $producto->save();
        }
		if(!empty($request['ancho_cara'])){
            $producto->ancho_cara = $request['ancho_cara'];
            $producto->save();
        }
		if(!empty($request['altas_graduaciones'])){
            $producto->altas_graduaciones = $request['altas_graduaciones'];
            $producto->save();
        }
		if(!empty($request['plaquetas_ajustables'])){
            $producto->plaquetas_ajustables = $request['plaquetas_ajustables'];
            $producto->save();
        }
		if(!empty($request['calibre'])){
            $producto->calibre = $request['calibre'];
            $producto->save();
        }
		if(!empty($request['largo_patillas'])){
            $producto->largo_patillas = $request['largo_patillas'];
            $producto->save();
        }

		if(!empty($request['altura_puente'])){
            $producto->altura_puente = $request['altura_puente'];
            $producto->save();
        }

		if(!empty($request['sexo'])){
            $producto->sexo = $request['sexo'];
            $producto->save();
        }
		if(!empty($request['rango_etario_desde'])){
            $producto->rango_etario_desde = $request['rango_etario_desde'];
            $producto->save();
        }
		if(!empty($request['rango_etario_hasta'])){
            $producto->rango_etario_hasta = $request['rango_etario_hasta'];
            $producto->save();
        }
		if(!empty($request['Costo'])){
            $producto->Costo = $request['Costo'];
            $producto->save();
        }
		if(!empty($request['impuesto'])){
            $producto->impuesto = $request['impuesto'];
            $producto->save();
        }
		if(!empty($request['ganancia'])){
            $producto->ganancia = $request['ganancia'];
            $producto->save();
        }
		if(!empty($request['monto'])){
            $producto->monto = $request['monto'];
            $producto->save();
        }
      
		if(!empty($request['descuento'])){
            $producto->descuento = $request['descuento'];
            $producto->save();
        }
      
		if(!empty($request['descuento_porcentaje'])){
            $producto->descuento_porcentaje = $request['descuento_porcentaje'];
            $producto->save();
        }

		if(!empty($request['destacado'])){
            $producto->destacado = $request['destacado'];
            $producto->save();
        }
		if(!empty($request['habilitado'])){
            $producto->habilitado = $request['habilitado'];
            $producto->save();
        }
		if(!empty($request['stock'])){
            $producto->stock = $request['stock'];
            $producto->save();
        }

		if(!empty($request['cambio_id'])){
            $producto->tipo_cambio_id = $request['cambio_id'];
            $producto->save();
        }
      
      
        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$producto->img1= $name;
            $producto->save();
		}  

		if($request->hasFile('file2')){
            $file = $request->file('file2');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$producto->img2 = $name;
            $producto->save();
		}  

		if($request->hasFile('file3')){
            $file = $request->file('file3');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$producto->img3 = $name;
            $producto->save();
		}  

		if($request->hasFile('file4')){
            $file = $request->file('file4');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$producto->img4 = $name;
            $producto->save();
		}  

        $productos = Producto::all();
        return redirect()->route('editar_productos', ['productos' => $productos])->with('alert_success_edit_producto', 'true');
    }

    public function return_editar_producto(Request $request)
    {
        $producto = Producto::find($request->id);
		$tipos_cambio = Tipo_Cambio::all();        
		$colores = Color::all();
		$marcas = Marca::all(); 
		$materiales = Material::all();
        return view('editar_producto', ['tipos_cambio' => $tipos_cambio, 'producto' => $producto, 'colores' => $colores, 'marcas' => $marcas, 'materiales' => $materiales]);         
    }

    public function eliminar_producto(Request $request)
    {
        $producto = Producto::find($request->id);        
        $producto->delete();        
        return redirect()->back()->with('alert_success_delete_producto', 'true');
    }


    public function editar_productos(Request $request)
    {
        $productos = Producto::all();
        return view('editar_productos', ['productos' => $productos]);
    }    


    public function registrar_producto(Request $request){
		$product = new Producto;
		$product->nombre = $request['name'];
		$product->nombre_base = $request['nombre_base'];
		$product->categoria_id = $request['categoria_id'];
		$product->color_id = $request['color_id'];
		$product->marca_id = $request['marca_id'];
		$product->forma_armazon_id = $request['forma_id'];
		$product->material_id = $request['material_id'];
		$product->distancia_apto_id = $request['distancia_id'];
		$product->tipo_cambio_id = $request['cambio_id'];
		$product->codigo = $request['codigo'];
		$product->descripcion = $request['descripcion'];
		$product->ancho_cara = $request['ancho_cara'];
		$product->altas_graduaciones = $request['altas_graduaciones'];
		$product->plaquetas_ajustables = $request['plaquetas_ajustables'];
		$product->calibre = $request['calibre'];
		$product->largo_patillas = $request['largo_patillas'];
		$product->altura_puente = $request['altura_puente'];
		$product->sexo = $request['sexo'];
		$product->rango_etario_desde = $request['rango_etario_desde'];
		$product->rango_etario_hasta = $request['rango_etario_hasta'];
		$product->costo = $request['costo'];
		$product->impuesto = $request['impuesto'];
		$product->ganancia = $request['ganancia'];
		$product->monto = $request['monto'];
		$product->monto_descuento = $request['monto_descuento'];
		$product->descuento_porcentaje = $request['descuento_porcentaje'];
		$product->destacado = $request['destacado'];
		$product->habilitado = $request['habilitado'];
		$product->stock = $request['stock'];
		$product->tipo_producto = $request['tipo_producto'];;
		$product->categoria_id = 1;
		
		

		  if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$product->img1 = $name;
		  }

		  if($request->hasFile('file2')){
            $file = $request->file('file2');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$product->img2 = $name;
		  }

		  if($request->hasFile('file3')){
            $file = $request->file('file3');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$product->img3 = $name;
		  }

		  if($request->hasFile('file4')){
            $file = $request->file('file4');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-products/', $name); 
			$product->img4 = $name;
		  }

		$product->save();
		return redirect()->back()->with('alert_success_producto', 'true');
	  }

	  public function alta_producto(Request $request)
	  {       
			$categorias = Categoria::all();
			$colores = Color::all();
			$marcas = Marca::all();
			$formas = Forma_Armazon::all();
			$materiales = Material::all();
			$distancias = Distancia_Apto::all();
			$tipos_cambio = Tipo_Cambio::all();
		  	return view('alta_producto', 
			['categorias' => $categorias, 'colores' => $colores, 
			'marcas' => $marcas, 'formas' => $formas, 'materiales' => $materiales, 
			'distancias' => $distancias,
			'tipos_cambio' => $tipos_cambio
			]);
	  }
}
