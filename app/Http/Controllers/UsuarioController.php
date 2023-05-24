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
use App\Models\Usuario;
use App\Models\Medico;

class UsuarioController extends Controller
{

    public function editar_usuario(Request $request)
    {
        $usuario = Usuario::find($request->id);
        $user = User::find($usuario->user_id);
        
        if(!empty($request['name'])){
            $user->name = $request['name'];
            $user->save();
        }

        if(!empty($request['email'])){
            $user->email = $request['email'];
            $user->save();
        }

        if(!empty($request['telefono'])){
            $user->telefono = $request['telefono'];
            $user->save();
        }

        if(!empty($request['celular'])){
            $user->celular = $request['celular'];
            $user->save();
        }

        if(!empty($request['direccion'])){
            $user->direccion = $request['direccion'];
            $user->save();
        }

        if(!empty($request['medico_id'])){
            $usuario->medico_id = $request['medico_id'];
            $usuario->save();
        }

        if(!empty($request['fecha_nacimiento'])){
            $usuario->fecha_nacimiento = $request['fecha_nacimiento'];
            $usuario->save();
        }

        if(!empty($request['obra_social'])){
            $usuario->obra_social = $request['obra_social'];
            $usuario->save();
        }

        if(!empty($request['afiliado'])){
            $usuario->afiliado = $request['afiliado'];
            $usuario->save();
        }

        if(!empty($request['password'])){
            $user->password = Hash::make($request['password']);
            $usuario->password_user = $request['password'];
            $usuario->save();
            $user->save();
        }

        if(!empty($request['dni'])){
            $usuario->dni = $request['dni'];
            $usuario->save();
        }  
        
        if(!empty($request['sexo'])){
            $usuario->sexo = $request['sexo'];
            $usuario->save();
        }  

        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-perfil/', $name); 
			$usuario->img = $name;
            $usuario->save();
		}  
        $usuarios = Usuario::all();
        return redirect()->route('editar_usuarios', ['usuarios' => $usuarios])->with('alert_success_edit_usuario', 'true');
    }

    public function return_editar_usuario(Request $request)
    {
        $usuario = Usuario::find($request->id);    
        $medicos = Medico::all();    
        return view('editar_usuario', ['medicos' => $medicos, 'usuario' => $usuario]);         
    }

    public function eliminar_usuario(Request $request)
    {
        $usuario = Usuario::find($request->id)->user();        
        $usuario->delete();        
        return redirect()->back()->with('alert_success_delete_usuario', 'true');
    }


    public function editar_usuarios(Request $request)
    {
        $usuarios = Usuario::all();
        return view('editar_usuarios', ['usuarios' => $usuarios]);
    }    

    public function registrar_usuario(Request $request)
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

        if(!empty($request['direccion']))
            $user->direccion = $request['direccion'];
    
        if(!empty($request['telefono']))
            $user->telefono = $request['telefono']; 

        if(!empty($request['celular']))
            $user->celular = $request['celular']; 
        
        $user->save();
    

        $usuario = new Usuario();
        $usuario->user_id = $user->id;
        $usuario->medico_id = $request->medico_id; 
        $usuario->dni = $request->dni;
        $usuario->sexo = $request->sexo;
        $usuario->password_user = $request->password;
        $usuario->fecha_nacimiento = $request->fecha_nacimiento; 

        if(!empty($request['obra_social']))
            $usuario->obra_social = $request['obra_social'];          
            
        if(!empty($request['afiliado']))
            $usuario->afiliado = $request['afiliado'];    
        
        if($request->hasFile('file1')){
            $file = $request->file('file1');
            $name = time().$file->getClientOriginalName();
			$file->move(public_path().'/img-perfil/', $name); 
			$usuario->img = $name;
		  }
        $usuario->save();                       

        return redirect()->back()->with('alert_success_usuario', 'true');
    }

    public function alta_usuario(Request $request)
    {       
        $medicos = Medico::all();
        return view('alta_usuario', ['medicos' => $medicos]);
    }
}
