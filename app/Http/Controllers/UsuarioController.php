<?php

namespace ConsulNet\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use ConsulNet\User;
use Carbon\Carbon;

//use ConsulNet\Http\Requests;

class UsuarioController extends Controller
{
 	public function listaUsuarios(){
 		$usuario = new User;
 		$usuarios = $usuario->with('paciente')->get();
 		return view('admin.usuarios_lista')->with('usuarios',$usuarios);
 	}

	public function nuevoUsuario(){
		return view("admin.usuario_nuevo");
	}

 	public function editaUsuario($id){
 		$usuario = User::where('id',$id)->first();
 		return view('admin.usuario_editar')->with('usuario',$usuario);
 	}

 	public function guardaUsuario(Request $request){
 		
 		$this->validate($request, [
 			'name' 	=> 'required',
 			'nom' 	=> 'string',
 			'email' => 'required|email',
 			'priv'	=> 'between:0,5',
 		]);/**/
 		
 		if(!empty($request->id)){
	 		$usuario = User::find($request->id);
	 	}else{
	 		$usuario = new User;
	 	}

 		$usuario->name 	= $request->name;
 		$usuario->nom  	= $request->nom;
 		$usuario->email	= $request->email;
 		$usuario->priv 	= $request->priv;
 		$usuario->updated_at = Carbon::now();
        $usuario->password = bcrypt($request->name);

 		$usuario->save();

		return redirect()->action('UsuarioController@listaUsuarios');


 	}

	public function eliminaUsuario($id){
 		$usuario = User::find($id);
 		return view('admin.usuario_eliminar')->with('usuario',$usuario);
	} 	

	public function eliminarUsuario(Request $request){
 		$usuario = User::find($request->id);
 		$usuario->delete();
		return redirect()->action('UsuarioController@listaUsuarios'); 		
	} 	


}
