<?php

namespace ConsulNet;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';

    protected $fillable = [
    	'sintomas',
    	'diagnostico',
    	'tratamiento',
    	'id_cita',
    	'id_paciente',
    	'id_medico',
    ];
}
