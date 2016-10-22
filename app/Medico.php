<?php

namespace ConsulNet;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
	protected $table = 'medicos';

    protected $fillable = [
    	'id_user',
    	'id_especialidad',
    ];
}
