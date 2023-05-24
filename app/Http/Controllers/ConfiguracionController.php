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
use App\Models\Tipo_Cambio;
use App\Models\Limite;


class ConfiguracionController extends Controller
{

    public function guardartipocambio(Request $request){
        $tipo_cambio_blue = Tipo_Cambio::find($request->tipo_blue_id);
        $tipo_cambio_blue->valor = $request->tipo_cambio_blue; 
        $tipo_cambio_blue->save(); 

        $tipo_cambio_oficial = Tipo_Cambio::find($request->tipo_oficial_id);
        $tipo_cambio_oficial->valor = $request->tipo_cambio_oficial; 
        $tipo_cambio_oficial->save(); 

        return redirect()->back()->with('success', 'true');

    }

    public function guardarcalibre(Request $request){

        $calibre_s = Limite::find($request->calibre_s_id); 
        $calibre_s->desde = $request->calibre_s_desde; 
        $calibre_s->hasta = $request->calibre_s_hasta; 
        $calibre_s->save(); 

        $calibre_m = Limite::find($request->calibre_m_id); 
        $calibre_m->desde = $request->calibre_m_desde; 
        $calibre_m->hasta = $request->calibre_m_hasta; 
        $calibre_m->save(); 

        $calibre_l = Limite::find($request->calibre_l_id); 
        $calibre_l->desde = $request->calibre_l_desde; 
        $calibre_l->hasta = $request->calibre_l_hasta; 
        $calibre_l->save(); 
    
        return redirect()->back()->with('success', 'true');

    }

    public function guardarancho(Request $request){

        $ancho_s = Limite::find($request->ancho_s_id); 
        $ancho_s->desde = $request->ancho_puente_s_desde; 
        $ancho_s->hasta = $request->ancho_puente_s_hasta; 
        $ancho_s->save(); 

        $ancho_m = Limite::find($request->ancho_m_id); 
        $ancho_m->desde = $request->ancho_puente_m_desde; 
        $ancho_m->hasta = $request->ancho_puente_m_hasta; 
        $ancho_m->save(); 

        $ancho_l = Limite::find($request->ancho_l_id); 
        $ancho_l->desde = $request->ancho_puente_l_desde; 
        $ancho_l->hasta = $request->ancho_puente_l_hasta; 
        $ancho_l->save(); 
    
        return redirect()->back()->with('success', 'true');

    }

    public function guardarlargo(Request $request){

        $largo_patillas_s = Limite::find($request->largo_s_id); 
        $largo_patillas_s->desde = $request->largo_patillas_s_desde; 
        $largo_patillas_s->hasta = $request->largo_patillas_s_hasta; 
        $largo_patillas_s->save(); 

        $largo_patillas_m = Limite::find($request->largo_m_id); 
        $largo_patillas_m->desde = $request->largo_patillas_m_desde; 
        $largo_patillas_m->hasta = $request->largo_patillas_m_hasta; 
        $largo_patillas_m->save(); 

        $largo_patillas_l = Limite::find($request->largo_l_id); 
        $largo_patillas_l->desde = $request->largo_patillas_l_desde; 
        $largo_patillas_l->hasta = $request->largo_patillas_l_hasta; 
        $largo_patillas_l->save(); 

        $largo_patillas_x = Limite::find($request->largo_x_id); 
        $largo_patillas_x->desde = $request->largo_patillas_x_desde; 
        $largo_patillas_x->hasta = $request->largo_patillas_x_hasta; 
        $largo_patillas_x->save(); 
    
        return redirect()->back()->with('success', 'true');

    }


    public function configuracion(){
        $tipo_cambio_blue = Tipo_Cambio::where('nombre', '=', 'Blue')->first();
        $tipo_cambio_oficial = Tipo_Cambio::where('nombre', '=', 'Oficial')->first();

        $ancho_puente_limites = Limite::where('nombre', '=', 'ancho_puente')->get();
        $largo_patillas_limites = Limite::where('nombre', '=', 'largo_patillas')->get();
        $calibre_limites = Limite::where('nombre', '=', 'calibre')->get();
        return view('configuracion', ['tipo_cambio_blue' => $tipo_cambio_blue, 'tipo_cambio_oficial' => $tipo_cambio_oficial, 'ancho_puente_limites' => $ancho_puente_limites, 'largo_patillas_limites' => $largo_patillas_limites, 'calibre_limites' => $calibre_limites]);
    }
}
