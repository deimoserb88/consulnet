<?php

namespace ConsulNet;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $table = 'citas';

    protected $fillable = [
    	'fecita',
    	'feregistro',
    	'hh',
    	'mm',
    	'id_paciente',
    	'id_medico',
    	'id_user_reg',
    ];
}
