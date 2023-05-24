<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\EnviarReceta;
use App\Models\User;
use App\Models\Vendedor;
use App\Models\Admin;
use App\Models\Usuario;
use App\Models\Distancia_Apto;
use App\Models\Forma_Armazon;
use App\Models\Forma_Cara;
use App\Models\Receta;
use App\Models\Lejos;
use App\Models\Cerca;
use App\Models\Producto;
use DateTime;


class RecetaController extends Controller
{

    public function anular(){
        session()->forget('carrito');
        return view('dashboard');
    }

    public function obtener_paciente(Request $request)
    {
        $usuario = Usuario::where('dni', '=', $request->dni_paciente)->first();    
        if(!$usuario)
            $usuario = false;

        $distancias = Distancia_Apto::all();  
        $formas = Forma_Cara::all();      
        return view('alta_receta', ['usuario' => $usuario, 'distancias' => $distancias, 'formas' => $formas, 'dni' => $request->dni_paciente ]);         
    }

    public function registrar_paciente(Request $request){
        $user = User::create([
            'name' => $request->nombre_paciente,
            'email' => $request->email_paciente,            
            'password' => Hash::make($request->dni_paciente),
        ]);
        
        $user->save();

        $usuario = new Usuario();
        $usuario->fecha_nacimiento = $request->fecha_nacimiento;
        $usuario->user_id = $user->id;
        $usuario->medico_id = $request->medico_id; 
        $usuario->dni = $request->dni_paciente;
        $usuario->save();

        $distancias = Distancia_Apto::all();  
        $formas = Forma_Cara::all();    

        return view('alta_receta', ['usuario' => $usuario, 'distancias' => $distancias, 'formas' => $formas]);
    }   

    public function return_editar_usuario(Request $request)
    {
        $usuario = Usuario::find($request->id);        
        return view('editar_usuario', ['usuario' => $usuario]);         
    }

    public function eliminar_receta(Request $request)
    {
        $receta = Receta::find($request->id);        
        $receta->delete();        
        return redirect()->back()->with('alert_success_delete_receta', 'true');
    }


    public function editar_recetas(Request $request)
    {
        $recetas = Receta::all();
        return view('editar_recetas', ['recetas' => $recetas]);

    }    

    public function editar_receta(Request $request)
    {
        $receta = Receta::find($request->id);       
        
        if(!empty($request['distancia_id'])){
            $receta->distancia_apto_id = $request['distancia_id'];
            $receta->save();
        }

        if(!empty($request['altura_puente'])){
            $receta->altura_puente = $request['altura_puente'];
            $receta->save();
        }

		if(!empty($request['ancho_cara'])){
            $receta->ancho_cara = $request['ancho_cara'];
            $receta->save();
        }

        if(!empty($request['largo_patillas'])){
            $receta->largo_patillas = $request['largo_patillas'];
            $receta->save();
        }

        if(!empty($request['forma_id'])){
            $receta->forma_id = $request['forma_id'];
            $receta->save();
        }

        if(!empty($request['distancia_interpupilar'])){
            $receta->distancia_interpupilar = $request['distancia_interpupilar'];
            $receta->save();
        }

        if(!empty($request['distancia_nasopupilar_derecha'])){
            $receta->distancia_nasopupilar_derecha = $request['distancia_nasopupilar_derecha'];
            $receta->save();
        }

        if(!empty($request['distancia_nasopupilar_izquierda'])){
            $receta->distancia_nasopupilar_izquierda = $request['distancia_nasopupilar_izquierda'];
            $receta->save();
        }

        if(!empty($request['observaciones'])){
            $receta->observaciones = $request['observaciones'];
            $receta->save();
        }       

        $lejos = new Lejos(); 
        $lejos->ejeOD = $request->lejos_eje_od;
        $lejos->ejeOI = $request->lejos_eje_oi;
        $lejos->esferaOD = $request->lejos_esfera_od; 
        $lejos->esferaOI = $request->lejos_esfera_oi; 
        $lejos->cilindroOD = $request->lejos_cilindro_od; 
        $lejos->cilindroOI = $request->lejos_cilindro_oi;
        $lejos->save(); 
        $receta->lejos_id = $lejos->id; 

        $cerca = new Cerca(); 
        $cerca->ejeOD = $request->cerca_eje_od;
        $cerca->ejeOI = $request->cerca_eje_oi;
        $cerca->esferaOD = $request->cerca_esfera_od; 
        $cerca->esferaOI = $request->cerca_esfera_oi; 
        $cerca->cilindroOD = $request->cerca_cilindro_od; 
        $cerca->cilindroOI = $request->cerca_cilindro_oi;
        $cerca->save(); 
        $receta->cerca_id = $cerca->id;
        $receta->save();

        $recetas = Receta::all();

        return view('editar_recetas', ['recetas' => $recetas])->with('alert_success_edit_receta', 'true');
    }

    public function return_editar_receta(Request $request)
    {
       /*$producto = Producto::find($request->id);
		$tipos_cambio = Tipo_Cambio::all(); */    
        $receta = Receta::find($request->id);   
        $usuario = Usuario::find($receta->paciente_id);
        $distancias = Distancia_Apto::all();  
        $formas = Forma_Cara::all();  
        return view('editar_receta', ['receta' => $receta, 'usuario' => $usuario, 'distancias' => $distancias, 'formas' => $formas]);         
    }

    public function registrar_receta(Request $request)
    {                           

        $receta = new Receta();
        $receta->medico_id = $request->medico_id;
        $receta->paciente_id = $request->paciente_id;
        $receta->sexo = $request->sexo;
        $receta->tipo = $request->tipo;
        $receta->plaquetas_ajustables = $request->plaquetas_ajustables;
        if($request->distancia_id == ""){
            $receta->distancia_apto_id = 1;
        }else{
            $receta->distancia_apto_id = $request->distancia_id;
        }
        
        $receta->forma_id = $request->forma_id; 
        $receta->altura_puente = $request->altura_puente; 
        $receta->largo_patillas = $request->largo_patillas; 
        $receta->ancho_cara = $request->ancho_cara; 
        $receta->distancia_interpupilar = $request->distancia_interpupilar;
        $receta->distancia_nasopupilar_derecha = $request->distancia_nasopupilar_derecha;
        $receta->distancia_nasopupilar_izquierda = $request->distancia_nasopupilar_izquierda;                
        $receta->observaciones = $request->observaciones; 
        $receta->usada = 0;                               
        
        
        $usuario = Usuario::find($request->paciente_id);
        $nacimiento = new DateTime($usuario->fecha_nacimiento); 
		$ahora = new DateTime(date("Y-m-d"));
		$diferencia = $ahora->diff($nacimiento);
		$edad = $diferencia->format("%y");

        if($edad <= 8){

            if($request->lejos_eje_od == 0.00 && $request->lejos_eje_oi == 0.00 && $request->lejos_esfera_od == 0.00
            && $request->lejos_esfera_oi == 0.00 && $request->lejos_cilindro_od == 0.00 && $request->lejos_cilindro_oi == 0.00)
            {
                return redirect('/obtenerpaciente?dni_paciente='.$usuario->dni)->with('error', 'error');
            }

            $lejos = new Lejos(); 
            $lejos->ejeOD = $request->lejos_eje_od;
            $lejos->ejeOI = $request->lejos_eje_oi;
            $lejos->esferaOD = $request->lejos_esfera_od; 
            $lejos->esferaOI = $request->lejos_esfera_oi; 
            $lejos->cilindroOD = $request->lejos_cilindro_od; 
            $lejos->cilindroOI = $request->lejos_cilindro_oi;
            $lejos->save(); 
            $receta->lejos_id = $lejos->id; 

            $cerca = new Cerca(); 
            $cerca->ejeOD = 0.00;
            $cerca->ejeOI = 0.00;
            $cerca->esferaOD = 0.00; 
            $cerca->esferaOI = 0.00; 
            $cerca->cilindroOD = 0.00; 
            $cerca->cilindroOI = 0.00;
            $cerca->save(); 
            $receta->cerca_id = $cerca->id;

        }else{
            
            if($request->lejos_eje_od == 0.00 && $request->lejos_eje_oi == 0.00 && $request->lejos_esfera_od == 0.00
            && $request->lejos_esfera_oi == 0.00 && $request->lejos_cilindro_od == 0.00 && $request->lejos_cilindro_oi == 0.00
            && $request->cerca_eje_od == 0.00  && $request->cerca_eje_oi == 0.00 && $request->cerca_esfera_od == 0.00
            && $request->cerca_esfera_oi == 0.00 && $request->cerca_cilindro_od == 0.00 && $request->cerca_cilindro_oi == 0.00)
            {
                return redirect('/obtenerpaciente?dni_paciente='.$usuario->dni)->with('error', 'error');

            }

            $cerca = new Cerca(); 
            $cerca->ejeOD = $request->cerca_eje_od;
            $cerca->ejeOI = $request->cerca_eje_oi;
            $cerca->esferaOD = $request->cerca_esfera_od; 
            $cerca->esferaOI = $request->cerca_esfera_oi; 
            $cerca->cilindroOD = $request->cerca_cilindro_od; 
            $cerca->cilindroOI = $request->cerca_cilindro_oi;
            $cerca->save(); 
            $receta->cerca_id = $cerca->id;

            $lejos = new Lejos(); 
            $lejos->ejeOD = $request->lejos_eje_od;
            $lejos->ejeOI = $request->lejos_eje_oi;
            $lejos->esferaOD = $request->lejos_esfera_od; 
            $lejos->esferaOI = $request->lejos_esfera_oi; 
            $lejos->cilindroOD = $request->lejos_cilindro_od; 
            $lejos->cilindroOI = $request->lejos_cilindro_oi;
            $lejos->save(); 
            $receta->lejos_id = $lejos->id;

        }               

        $usuario = Usuario::find($receta->paciente_id);             

        $receta->save();

        Mail::to($usuario->user->email)->send(new EnviarReceta($usuario, $receta));

        return redirect('/obtenerpaciente?dni_paciente='.$usuario->dni)->with('alert_success_receta', 'true');
    }

    public function producto_recetado(Request $request)
    {    
        if(isset($_GET['receta_id'])){
            $receta = Receta::find($_GET['receta_id']);       
        }else{
            $receta = Receta::find($request->receta_id);   
        }        
        $usuario = Usuario::find($receta->paciente_id);
        $nacimiento = new DateTime($usuario->fecha_nacimiento); 
		$ahora = new DateTime(date("Y-m-d"));
		$diferencia = $ahora->diff($nacimiento);
		$edad = $diferencia->format("%y");    

        // ESTO ES PARA CHICOS MENORES DE 2 AÑOS, TOMA POR MESES ---------------------------------------------
        if($edad < 2){
            $meses = $diferencia->format("%m");            
            
            if(isset($request->tipo_lente) && $request->tipo_lente == 'desol'){
                
                $productos = Producto::where('categoria_id', '=', 2)
                                     ->where('distancia_apto_id', '=', 1)
                                     ->where('tipo_producto', '=', 'Armazon')
                                     ->where('rango_etario_desde_meses', '<=', $meses)
                                     ->where('rango_etario_hasta_meses', '>=', $meses)->get();
                                    $esparaverdecerca = false;
                                                                          
                return view('productos_sol', ['productos' => $productos, 'receta' => $receta, 'esparaverdecerca' => $esparaverdecerca]);
            } 
            
            if(isset($request->tipo_lente) && $request->tipo_lente == 'clipOn'){
               
                $productos = Producto::where('categoria_id', '=', 3)
                                     ->where('distancia_apto_id', '=', 1)
                                     ->where('tipo_producto', '=', 'Armazon')
                                     ->where('rango_etario_desde_meses', '<=', $meses)
                                     ->where('rango_etario_hasta_meses', '>=', $meses)->get();
                                                                          
                return view('productos_clipon', ['productos' => $productos, 'receta' => $receta]);
            }
        
            $productos = Producto::where('categoria_id', '=', 1)
                                 ->where('distancia_apto_id', '=', 1)
                                 ->where('tipo_producto', '=', 'Armazon')
                                 ->where('rango_etario_desde_meses', '<=', $meses)
                                 ->where('rango_etario_hasta_meses', '>=', $meses)->get();;

            return view('productos', ['productos' => $productos, 'receta' => $receta]);
        }

        //--------------------------------------------------------------------------------------------
      

        if($edad >= 2 && $edad <= 8){                                               

            if(isset($request->tipo_lente) && $request->tipo_lente == 'desol'){               
                $productos = Producto::where('categoria_id', '=', 2)
                                     ->where('distancia_apto_id', '=', 1)
                                     ->where('tipo_producto', '=', 'Armazon')
                                     ->where('rango_etario_desde', '<=', $edad)
                                     ->where('rango_etario_hasta', '>=', $edad)->get();
                                     $esparaverdecerca = false;
                                                                          
                return view('productos_sol', ['productos' => $productos, 'receta' => $receta, 'esparaverdecerca' => $esparaverdecerca]);
            } 
            
            if(isset($request->tipo_lente) && $request->tipo_lente == 'clipOn'){          
                $productos = Producto::where('categoria_id', '=', 3)
                                     ->where('distancia_apto_id', '=', 1)
                                     ->where('tipo_producto', '=', 'Armazon')
                                     ->where('rango_etario_desde', '<=', $edad)
                                     ->where('rango_etario_hasta', '>=', $edad)->get();
                                                                          
                return view('productos_clipon', ['productos' => $productos, 'receta' => $receta]);
            }
            
            $productos = Producto::where('categoria_id', [1,4])                                    
                                     ->where('distancia_apto_id', '=', 1)
                                     ->where('tipo_producto', '=', 'Armazon')
                                     ->where('rango_etario_desde', '<=', $edad)
                                     ->where('rango_etario_hasta', '>=', $edad)->get();

            return view('productos', ['productos' => $productos, 'receta' => $receta]);
        }

        if($edad > 8){                     
            
            if($receta->ancho_cara != null){
                if($receta->ancho_cara == 'S'){
                    $valor_maximo_calibre = 53; 
                    $valor_minimo_calibre = 0;
                }
                if($receta->ancho_cara == 'M'){
                    $valor_maximo_calibre = 57; 
                    $valor_minimo_calibre = 48;
                }
                if($receta->ancho_cara == 'L'){
                    $valor_maximo_calibre = 100; 
                    $valor_minimo_calibre = 52;
                }
            }else{
                    $valor_maximo_calibre = 100; 
                    $valor_minimo_calibre = 0;
            }

            if($receta->altura_puente != null){
                if($receta->altura_puente == 'A'){
                    $valor_maximo_puente = 6; 
                    $valor_minimo_puente = 3;
                }
                if($receta->altura_puente == 'M'){
                    $valor_maximo_puente = 3; 
                    $valor_minimo_puente = -3;
                }
                if($receta->altura_puente == 'B'){
                    $valor_maximo_puente = -3; 
                    $valor_minimo_puente = -6;
                }

            }else{
                    $valor_maximo_puente = 6; 
                    $valor_minimo_puente = -6;
            }

            if($receta->largo_patillas != null){
                if($receta->largo_patillas == 'S'){
                    $valor_maximo_patillas = 130; 
                    $valor_minimo_patillas = 125;
                }
                if($receta->largo_patillas == 'M'){
                    $valor_maximo_patillas = 135; 
                    $valor_minimo_patillas = 131;
                }
                if($receta->largo_patillas == 'L'){
                    $valor_maximo_patillas = 140; 
                    $valor_minimo_patillas = 136;
                }
                if($receta->largo_patillas == 'XL'){
                    $valor_maximo_patillas = 180; 
                    $valor_minimo_patillas = 140;
                }
            }else{
                    $valor_maximo_patillas = 180; 
                    $valor_minimo_patillas = 125;
            }
            

            if(isset($request->tipo_lente) && $request->tipo_lente == 'desol'){
                                
                if($receta->distancia_apto_id == 2){   
                    
                    if($receta->cerca){                  
                                                              
                        $productos = Producto::where('categoria_id', '=', 2)
                                            ->where('tipo_producto', '=', 'Armazon')
                                            //->where('sexo', '=', $usuario->sexo)                                                                                   
                                            ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                            ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                            ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();                                            
                        
                        $esparaverdecerca = false; 
                                                                                
                        return view('productos_sol', ['productos' => $productos, 'receta' => $receta, 'esparaverdecerca' => $esparaverdecerca]);
                    }
                }

                if($receta->distancia_apto_id == 1){

                        if($receta->lejos){

                            if($receta->lejos->esferaOD > 4){
                                $altas_graduaciones = 1; 
                            }else{
                                $altas_graduaciones = 0; 
                            }
                                                                                                        
                            $productos = Producto::where('categoria_id', '=', 2)
                                                ->where('tipo_producto', '=', 'Armazon')
                                                //->where('sexo', '=', $usuario->sexo)
                                                ->where('altas_graduaciones', '=', $altas_graduaciones)
                                                ->whereIn('distancia_apto_id', [1])
                                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();

                            $esparaverdecerca = false; 
                                                                                    
                            return view('productos_sol', ['productos' => $productos, 'receta' => $receta, 'esparaverdecerca' => $esparaverdecerca]);
                        }
                    }
            } 

            if(isset($request->tipo_lente) && $request->tipo_lente == 'clipOn'){
                
                if($receta->distancia_apto_id == 1){             
                    

                    if($receta->lejos){
                        
                        if($receta->lejos->esferaOD > 4){
                            $altas_graduaciones = 1; 
                        }else{
                            $altas_graduaciones = 0; 
                        }
                                                                        
                        $receta = Receta::find($request->receta_id);
                        $productos = Producto::where('categoria_id', '=', 3)
                                            ->where('tipo_producto', '=', 'Armazon')
                                            //->where('sexo', '=', $usuario->sexo)
                                            ->where('altas_graduaciones', '=', $altas_graduaciones)                                            
                                            ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                            ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                            ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();
                                                                                
                        return view('productos_clipon', ['productos' => $productos, 'receta' => $receta]);
                    }
                } 
            }


           if($receta->distancia_apto_id == 2){
                if($receta->cerca){

                            if($receta->cerca->esferaOD > 4){
                                $altas_graduaciones = 1; 
                            }else{
                                $altas_graduaciones = 0; 
                            }                   
                                                                            
                            $receta = Receta::find($request->receta_id);
                            if(isset($_GET['degresivos'])){
                                $productos = Producto::where('categoria_id', '=', 1)                                        
                                ->where('tipo_producto', '=', 'Armazon')
                                //->where('sexo', '=', $usuario->sexo)
                                ->where('altas_graduaciones', '=', $altas_graduaciones)                                        
                                ->whereIn('distancia_apto_id', [4])
                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)
                                ->get();
                                $degresivos = true; 
                                return view('productos', ['productos' => $productos, 'receta' => $receta, 'degresivos' => $degresivos]);
                            }else{
                                $productos = Producto::where('categoria_id', '=', 1)                                        
                                ->where('tipo_producto', '=', 'Armazon')
                                //->where('sexo', '=', $usuario->sexo)
                                ->where('altas_graduaciones', '=', $altas_graduaciones)                                        
                                ->whereIn('distancia_apto_id', [2, 4])
                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)
                                ->get();
                                return view('productos', ['productos' => $productos, 'receta' => $receta]);
                            }          

                        
                        }
            }
            if($receta->distancia_apto_id == 1){

                if($receta->lejos){
                    
                    if($receta->lejos->esferaOD > 4){
                        $altas_graduaciones = 1; 
                    }else{
                        $altas_graduaciones = 0; 
                    }
                                                                      
                    $receta = Receta::find($request->receta_id);
                    $productos = Producto::where('categoria_id', '=', 1)                                        
                                        ->where('tipo_producto', '=', 'Armazon')
                                        //->where('sexo', '=', $usuario->sexo)
                                        ->where('altas_graduaciones', '=', $altas_graduaciones)
                                        ->whereIn('distancia_apto_id', [1, 4])
                                        ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                        ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                        ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();
                                                                            
                    return view('productos', ['productos' => $productos, 'receta' => $receta]);
                }
            }

            if($receta->distancia_apto_id == 3){

                if(isset($request->tipo_lente) && $request->tipo_lente == 'desol'){       
                    
                    if(isset($_GET['lejosymultifocales']) && $_GET['lejosymultifocales'] == true){

                        $productos = Producto::where('categoria_id', '=', 2)
                                                ->where('tipo_producto', '=', 'Armazon')   
                                                ->whereIn('distancia_apto_id', [1, 4])                                            
                                                //->where('sexo', '=', $usuario->sexo)                                                                                   
                                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();                                            
                            
                            $esparaverdecerca = false;                            
                                                                                    
                            return view('productos_sol', ['productos' => $productos, 'receta' => $receta, 'esparaverdecerca' => $esparaverdecerca]);
                    }

                    if(isset($_GET['clipon']) && $_GET['clipon'] == true){

                        $productos = Producto::where('categoria_id', '=', 3)
                                                ->where('tipo_producto', '=', 'Armazon')   
                                                ->where('distancia_apto_id', [4])                                                
                                                //->where('sexo', '=', $usuario->sexo)                                                                                   
                                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();                                            
                            
                            $esparaverdecerca = false;                            
                                                                                    
                            return view('productos_sol', ['productos' => $productos, 'receta' => $receta, 'esparaverdecerca' => $esparaverdecerca]);
                    }
                    
                                                                  
                            $productos = Producto::where('categoria_id', '=', 2)
                                                ->where('tipo_producto', '=', 'Armazon')   
                                                ->where('distancia_apto_id', '=', 4)                                                
                                                //->where('sexo', '=', $usuario->sexo)                                                                                   
                                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();                                            
                            
                            $esparaverdecerca = false;
                            $desolmultifocales = true;
                                                                                    
                            return view('productos_sol', ['productos' => $productos, 'receta' => $receta, 'esparaverdecerca' => $esparaverdecerca, 'desolmultifocales' => $desolmultifocales]);
                }                                                               
                

                if(isset($request->distancia) && $request->distancia == "lejosycerca"){  
                    $primero = true;

                    if(isset($_GET['segundo']) && $_GET['segundo'] == true){
                        $primero = false;
                    }else{
                        $primero = true; 
                    }                   
                    
                        if($receta->lejos->esferaOD > 4){
                            $altas_graduaciones = 1; 
                        }else{
                            $altas_graduaciones = 0; 
                        }
                                                                                           
                        $receta = Receta::find($request->receta_id);
                        if($primero){
                            $productos = Producto::where('categoria_id', '=', 1)                                        
                                                ->where('tipo_producto', '=', 'Armazon')
                                                //->where('sexo', '=', $usuario->sexo)
                                                ->where('altas_graduaciones', '=', $altas_graduaciones)
                                                ->whereIn('distancia_apto_id', [1, 4])
                                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();                                                        
                                                                                    
                            return view('productos', ['productos' => $productos, 'receta' => $receta, 'primero' => $primero]);
                        }else{
                            $solocerca = true;                     
                                                                                                                        
                            if(isset($_GET['degresivos']) && $_GET['degresivos'] == "si"){                            
                                $productos = Producto::where('categoria_id', '=', 1)                                        
                                ->where('tipo_producto', '=', 'Armazon')
                                //->where('sexo', '=', $usuario->sexo)
                                ->where('altas_graduaciones', '=', $altas_graduaciones)                                        
                                ->whereIn('distancia_apto_id', [2])
                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)
                                ->get();
                                $degresivos = true; 
                                return view('productos', ['productos' => $productos, 'receta' => $receta, 'degresivos' => $degresivos, 'solocerca' => $solocerca, 'primero' => $primero]);
                            }else{
                                $productos = Producto::where('categoria_id', '=', 1)                                        
                                ->where('tipo_producto', '=', 'Armazon')
                                //->where('sexo', '=', $usuario->sexo)
                                ->where('altas_graduaciones', '=', $altas_graduaciones)                                        
                                ->whereIn('distancia_apto_id', [2, 4])
                                ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)
                                ->get();
                                return view('productos', ['productos' => $productos, 'receta' => $receta, 'solocerca' => $solocerca, 'primero' => $primero]);
                            }                                                                                                                                                                                 
                        }
                    

                }


                if(isset($request->distancia) && $request->distancia == "cerca"){                                        

                    if($receta->cerca){

                        if($receta->cerca->esferaOD > 4){
                            $altas_graduaciones = 1; 
                        }else{
                            $altas_graduaciones = 0; 
                        }     
                        
                        $solocerca = true;                     
                                                                                                                        
                        if(isset($_GET['degresivos']) && $_GET['degresivos'] == "si"){                            
                            $productos = Producto::where('categoria_id', '=', 1)                                        
                            ->where('tipo_producto', '=', 'Armazon')
                            //->where('sexo', '=', $usuario->sexo)
                            ->where('altas_graduaciones', '=', $altas_graduaciones)                                        
                            ->whereIn('distancia_apto_id', [4])
                            ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                            ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                            ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)
                            ->get();
                            $degresivos = true; 
                            return view('productos', ['productos' => $productos, 'receta' => $receta, 'degresivos' => $degresivos, 'solocerca' => $solocerca]);
                        }else{
                            $productos = Producto::where('categoria_id', '=', 1)                                        
                            ->where('tipo_producto', '=', 'Armazon')
                            //->where('sexo', '=', $usuario->sexo)
                            ->where('altas_graduaciones', '=', $altas_graduaciones)                                        
                            ->whereIn('distancia_apto_id', [2, 4])
                            ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                            ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                            ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)
                            ->get();
                            return view('productos', ['productos' => $productos, 'receta' => $receta, 'solocerca' => $solocerca]);
                        }                              
                    }                        
                }


                if(isset($request->distancia) && $request->distancia == "multifocales"){                                        
                
                        if($receta->cerca->esferaOD > 4){
                            $altas_graduaciones = 1; 
                        }else{
                            $altas_graduaciones = 0; 
                        }                                                              
                                                                                                                                               
                            $productos = Producto::where('categoria_id', '=', 1)                                        
                            ->where('tipo_producto', '=', 'Armazon')
                            //->where('sexo', '=', $usuario->sexo)
                            ->where('altas_graduaciones', '=', $altas_graduaciones)                                        
                            ->whereIn('distancia_apto_id', [4])
                            ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                            ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                            ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)
                            ->get();

                            $multifocales = true; 

                            return view('productos', ['productos' => $productos, 'receta' => $receta, 'multifocales' => $multifocales]);
                }                              
                                                            

                if($receta->lejos){
                    
                    if($receta->lejos->esferaOD > 4){
                        $altas_graduaciones = 1; 
                    }else{
                        $altas_graduaciones = 0; 
                    }
                                                                      
                    $receta = Receta::find($request->receta_id);
                    $productos = Producto::where('categoria_id', '=', 1)                                        
                                        ->where('tipo_producto', '=', 'Armazon')
                                        //->where('sexo', '=', $usuario->sexo)
                                        ->where('altas_graduaciones', '=', $altas_graduaciones)
                                        ->whereIn('distancia_apto_id', [1, 4])
                                        ->where('calibre', '<=', $valor_maximo_calibre)->where('calibre', '>=', $valor_minimo_calibre)
                                        ->where('altura_puente', '<=', $valor_maximo_puente)->where('altura_puente', '>=', $valor_minimo_puente)
                                        ->where('largo_patillas', '<=', $valor_maximo_patillas)->where('largo_patillas', '>=', $valor_minimo_patillas)->get();                                                        
                                                                            
                    return view('productos', ['productos' => $productos, 'receta' => $receta]);
                }
            }
        }
    }

    public function accesorios(Request $request)
    {               
        $productos = Producto::where('tipo_producto', '=', 'Accesorio')->get();
        return view('accesorios', ['productos' => $productos]);
    }

    public function alta_receta(Request $request)
    {               
        return view('buscar_paciente');
    }
}
