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

class VendedorController extends Controller
{

    public function editar_vendedor(Request $request)
    {
        $vendedor = Vendedor::find($request->id);
        $user = User::find($vendedor->user_id);
        
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
            $vendedor->dni = $request['dni'];
            $vendedor->save();
        }                

        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-perfil/', $name); 
			$vendedor->img = $name;
            $vendedor->save();
		}  
        $vendedores = Vendedor::all();
        return redirect()->route('editar_vendedores', ['vendedores' => $vendedores])->with('alert_success_edit_vendedor', 'true');
    }

    public function return_editar_vendedor(Request $request)
    {
        $vendedor = Vendedor::find($request->id);        
        return view('editar_vendedor', ['vendedor' => $vendedor]);         
    }

    public function eliminar_vendedor(Request $request)
    {
        $vendedor = Vendedor::find($request->id)->user();        
        $vendedor->delete();        
        return redirect()->back()->with('alert_success_delete_vendedor', 'true');
    }


    public function editar_vendedores(Request $request)
    {
        $vendedores = Vendedor::all();
        return view('editar_vendedores', ['vendedores' => $vendedores]);
    }    

    public function registrar_vendedor(Request $request)
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

        $vendedor = new Vendedor();
        $vendedor->user_id = $user->id;
        $vendedor->dni = $request->dni;
        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-perfil/', $name); 
			$vendedor->img = $name;
		  }
        $vendedor->save();                       

        return redirect()->back()->with('alert_success_medico', 'true');
    }

    public function alta_vendedor(Request $request)
    {       
        return view('alta_vendedor');
    }
}
