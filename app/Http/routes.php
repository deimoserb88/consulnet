<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'], function () {
        
    Route::auth();
    
    Route::get('/', function () {
        return view('welcome');
    });

	//rutas para manejo de usuarios*****************************        

    Route::get('/home','HomeController@index');       
	
    Route::get('usuarios',[
		'middleware'=>'auth',
		'uses' => 'UsuarioController@listaUsuarios'
	]);

	Route::get('usuarionuevo',[
		'middleware'=>'auth',
		'uses' => 'UsuarioController@nuevoUsuario'
	]);

	Route::get('usuarioedita/{id}',[
		'middleware'=>'auth',
		'uses' => 'UsuarioController@editaUsuario'
	]);

	Route::get('usuarioelimina/{id}',[
		'middleware'=>'auth',
		'uses' => 'UsuarioController@eliminaUsuario'
	]);

	Route::post('eliminarusuario',[
		'middleware'=>'auth',
		'uses' => 'UsuarioController@eliminarUsuario'
	]);

	Route::post('guardausuario',[
		'middleware'=>'auth',
		'uses' => 'UsuarioController@guardaUsuario'
	]);

	//rutas para manejo de pacientes*****************************

	Route::get('pacientes',[
		'middleware' => 'auth',
		'uses' => 'PacientesController@listaPacientes'
	]);

	Route::get('pacientenuevo',[
		'middleware'=>'auth',
		'uses' => 'PacientesController@nuevoPaciente'
	]);

	Route::post('guardapaciente',[
		'middleware'=>'auth',
		'uses' => 'PacientesController@guardarPaciente'
	]);

});



