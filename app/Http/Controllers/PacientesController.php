<?php

namespace ConsulNet\Http\Controllers;

//use Illuminate\Http\Request;
use ConsulNet\Http\Requests;
use Request;
use Response;
use ConsulNet\Paciente;
use ConsulNet\User;
use Carbon\Carbon;

class PacientesController extends Controller
{
    public function listaPacientes(){   
    	$paciente = new Paciente; 	
 		$pacientes = $paciente->with('usuario')->get();
 		return view('admin.pacientes_lista')->with('pacientes',$pacientes);
 	} 

 	public function nuevoPaciente(){
 		return view('admin.paciente_nuevo'); 		
 	}

 	public function guardarPaciente(){

 		$datos = Request::all();

 		$u = new User;
 		$u->name = substr($datos['email'],0,strpos($datos['email'],'@'));
 		$u->password = bcrypt($u->name);
 		$u->email = $datos['email'];
 		$u->priv = 5;
 		$u->nom = $datos['nom'];
 		$u->save();

 		//$iduser = Response::json(array('success' => true, 'last_insert_id' => $u->id), 200);
 		//esto no se uso pero esta chido es para obtener el id del ultimo registro insertado


 		$p = new Paciente(['id_user'=>$u->id]);//para agregar el valor de la llave foranea
 		//$p->id_user = $iduser;
 		$fena = date_parse($datos['fena']);
 		$p->fena = Carbon::createFromDate($fena['year'],$fena['month'],$fena['day']);
 		$p->ts = $datos['ts'];
 		$p->con_esp = $datos['con_esp'];
 		$p->save();
 		

 		return redirect()->action('PacientesController@listaPacientes');
 	}

}
