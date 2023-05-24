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

class MedicoController extends Controller
{

    public function editar_medico(Request $request)
    {
        $medico = Medico::find($request->id);
        $user = User::find($medico->user_id);
        
        if(!empty($request['name'])){
            $user->name = $request['name'];
            $user->save();
        }

        if(!empty($request['email'])){
            $user->email = $request['email'];
            $user->save();
        }

        if(!empty($request['password'])){
            $user->password = Hash::make($request['password']);
            $user->save();
        }

        if(!empty($request['dni'])){
            $medico->dni = $request['dni'];
            $medico->save();
        }
        
        if(!empty($request['matricula'])){
            $medico->matricula = $request['matricula'];
            $medico->save();
        }      

        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-perfil/', $name); 
			$medico->img = $name;
            $medico->save();
		}  
        $medicos = Medico::all();
        return redirect()->route('editar_medicos', ['medicos' => $medicos])->with('alert_success_edit_medico', 'true');
    }

    public function return_editar_medico(Request $request)
    {
        $medico = Medico::find($request->id);        
        return view('editar_medico', ['medico' => $medico]);         
    }

    public function eliminar_medico(Request $request)
    {
        $medico = Medico::find($request->id)->user();        
        $medico->delete();        
        return redirect()->back()->with('alert_success_delete_medico', 'true');
    }


    public function editar_medicos(Request $request)
    {
        $medicos = Medico::all();
        return view('editar_medicos', ['medicos' => $medicos]);
    }

    public function registrar_medico(Request $request)
    {              
        $request->validate([
            'name' => ['required', 'string', 'max:255'],            
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],                          
        ]);  

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,            
            'password' => Hash::make($request->password),
        ]);

        $medico = new Medico();
        $medico->user_id = $user->id;
        $medico->matricula = $request->matricula; 
        $medico->dni = $request->dni;
        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-perfil/', $name); 
			$medico->img = $name;
		  }
        $medico->save();                       

        return redirect()->back()->with('alert_success_medico', 'true');
    }
}
