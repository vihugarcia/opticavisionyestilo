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
use App\Models\Cristal;
use App\Models\Tipo_Cristal;
use App\Models\Tipo_Cambio;
use App\Models\Receta;

class CristalController extends Controller
{

    public function cristal(Request $request){
        $cristal = Cristal::find($request['cristal_id']);		
		return view('cristal', ['cristal' => $cristal]);
    }

    public function addtocart(Request $request)
	{
		$cristal = Cristal::find($request['cristal_id']);	
		$carrito = new Carrito;	              

		if(session()->has('carrito')){            
			$carrito = session()->get('carrito');
            $receta = Receta::find($carrito->receta_id);
            if($carrito->cristales){
                $carrito->cantidad = count($carrito->cristales);
			    $arrayCristales = $carrito->cristales;			
             }else
                $arrayCristales = [];
		}else
			$arrayCristales = [];	

		array_push($arrayCristales, $cristal);		
		$carrito->cristales = $arrayCristales;
        
		session()->put('carrito', $carrito);
        $carrito->cantidad = count($carrito->cristales);	          
        
        if($carrito->cantidad == 1 && $receta->distancia_apto_id == 3){                 
            return redirect("/verproductorecetado?receta_id=" . $receta->id . "&distancia=lejosycerca&segundo=true");
        }
        else{   
            return view('pedido');		
	    }
    }

	public function editar_cristal(Request $request)
    {
        $cristal = Cristal::find($request->id);      
		$tipo_cristal = Tipo_Cristal::find($cristal->tipo_cristal_id); 

        if(!empty($request['cambio_id'])){
            $cristal->tipo_cambio_id = $request['cambio_id'];
            $cristal->save();
        }   
        
        if(!empty($request['name'])){
            $tipo_cristal->nombre = $request['name'];
            $tipo_cristal->save();
        }       

		if(!empty($request['codigo'])){
            $tipo_cristal->codigo = $request['codigo'];
            $tipo_cristal->save();
        }
		if(!empty($request['description'])){
            $tipo_cristal->description = $request['description'];
            $tipo_cristal->save();
        }
		if(!empty($request['variante'])){
            $tipo_cristal->variante = $request['variante'];
            $tipo_cristal->save();
        }
		if(!empty($request['esfera_desde'])){
            $tipo_cristal->esfera_desde = $request['esfera_desde'];
            $tipo_cristal->save();
        }
		if(!empty($request['esfera_hasta'])){
            $tipo_cristal->esfera_hasta = $request['esfera_hasta'];
            $tipo_cristal->save();
        }
		if(!empty($request['cilindro_desde'])){
            $tipo_cristal->cilindro_desde = $request['cilindro_desde'];
            $tipo_cristal->save();
        }

		if(!empty($request['cilindro_hasta'])){
            $tipo_cristal->cilindro_hasta = $request['cilindro_hasta'];
            $tipo_cristal->save();
        }

        if(!empty($request['eje_desde'])){
            $tipo_cristal->eje_desde = $request['eje_desde'];
            $tipo_cristal->save();
        }

		if(!empty($request['eje_hasta'])){
            $tipo_cristal->eje_hasta = $request['eje_hasta'];
            $tipo_cristal->save();
        }

		if(!empty($request['habilitado'])){
            $tipo_cristal->habilitado = $request['habilitado'];
            $tipo_cristal->save();
        }
		
		if(!empty($request['monto'])){
            $tipo_cristal->monto = $request['monto'];
            $tipo_cristal->save();
        }   
               

        $cristales = Cristal::all();
        return redirect()->route('editar_cristales', ['cristales' => $cristales])->with('alert_success_edit_cristal', 'true');
    }

    public function return_editar_cristal(Request $request)
    {
        $cristal = Cristal::find($request->id);   
        $tipos_cambio = Tipo_Cambio::all();     
        return view('editar_cristal', ['cristal' => $cristal, 'tipos_cambio' => $tipos_cambio]);         
    }

    public function eliminar_cristal(Request $request)
    {
        $cristal = Cristal::find($request->id);        
        $cristal->delete();        
        return redirect()->back()->with('alert_success_delete_cristal', 'true');
    }


    public function editar_cristales(Request $request)
    {
        $cristales = Cristal::all();
        return view('editar_cristales', ['cristales' => $cristales]);
    }    


    public function registrar_cristal(Request $request){
		$cristal = new Cristal;
		$cristal->dip = $request['dip'];
		$cristal->altura = $request['altura'];

		$tipo_cristal = new Tipo_Cristal();
		$tipo_cristal->nombre = $request['name'];
        $cristal->tipo_cambio_id = $request['cambio_id'];
		$tipo_cristal->codigo = $request['codigo'];
        $tipo_cristal->monto = $request['monto'];
		$tipo_cristal->variante = $request['variante'];
		$tipo_cristal->descripcion = $request['descripcion'];
		$tipo_cristal->tipo = $request['tipo'];
		$tipo_cristal->esfera_desde = $request['esfera_desde'];
		$tipo_cristal->esfera_hasta = $request['esfera_hasta'];
		$tipo_cristal->cilindro_desde = $request['cilindro_desde'];
		$tipo_cristal->cilindro_hasta = $request['cilindro_hasta'];
        $tipo_cristal->eje_desde = $request['eje_desde'];
        $tipo_cristal->eje_hasta = $request['eje_hasta'];
		$tipo_cristal->habilitado = $request['habilitado'];		
		$tipo_cristal->save();
		
		$cristal->tipo_cristal_id = $tipo_cristal->id;				
		$cristal->save();

		return redirect()->back()->with('alert_success_cristal', 'true');
	  }

	  public function alta_cristal(Request $request)
	  {       
            $tipos_cambio = Tipo_Cambio::all();
			return view('alta_cristal', ['tipos_cambio' => $tipos_cambio]);
	  }
}
