<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Vendedor;
use App\Models\Admin;
use App\Models\Medico;
use App\Models\Orden;
use App\Models\Receta;
use App\Models\Usuario;
use Illuminate\Support\Facades\Mail;
use App\Mail\Confirmacion;

class OrdenController extends Controller
{

    public function success(Request $request){
		session()->forget('carrito');
		if(isset($_GET['preference_id'])){	
            $orden = Orden::where('preference_id', '=', $_GET['preference_id'])->first();	
            $orden->estado = "Pagado";
            $orden->receta->usada = true;
            $orden->receta->save();
            $orden->save();

            $usuario = Usuario::find($orden->paciente_id);

            Mail::to('jessijuampi@gmail.com')->send(new Confirmacion($usuario, $orden));


        }
        session()->put('successPago', 'true');	
        return view('dashboard');
    }
		
	public function failure(){
		session()->put('failure', 'true');		
		return view('dashboard');
	}

	public function pending(Request $request){		
		session()->put('failure', 'true');		
		return view('dashboard');
	}

	public function ordenes(Request $request){	
		$ordenes = Orden::where('paciente_id', '=', Auth::user()->usuario->id)->get();
		return view('ordenes', ['ordenes' => $ordenes]);
	}

	public function editar_ordenes(Request $request)
    {
        $ordenes = Orden::all();
        return view('editar_ordenes', ['ordenes' => $ordenes]);
    }    

	public function return_editar_orden(Request $request)
    {
        $orden = Orden::find($request->id);        
        return view('editar_orden', ['orden' => $orden]);         
    }

	public function editar_orden(Request $request)
    {
        $orden = Orden::find($request->id);
       
        if(!empty($request['estado'])){
            $orden->estado = $request['estado'];
            $orden->save();
        }
       
        $ordenes = Orden::all();
        return redirect()->route('editar_ordenes', ['ordenes' => $ordenes])->with('alert_success_edit_orden', 'true');
    }
}
