<?php

namespace ConsulNet;

use Illuminate\Database\Eloquent\Model;
//use ConsulNet\User;


class Paciente extends Model
{
    protected $table = 'pacientes';

    protected $fillable = [
    	'id_user',
    	'fena',
    	'ts',
    	'con_esp',
    ];

    public function usuario(){
    	return $this->belongsTo('ConsulNet\User','id_user');
    } 

    public static function tiposangre($ts){
    	$tiposangre = [
	    	1 => 'A+',
	    	2 => 'A-',
	    	3 => 'B+',
	    	4 => 'B-',
	    	5 => 'AB+',
	    	6 => 'AB-',
	    	7 => 'O+',
	    	8 => 'O-'
    	];	
    	return $tiposangre[$ts];
    } 

}
