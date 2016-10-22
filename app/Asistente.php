<?php

namespace ConsulNet;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $table = 'asistentes';

    protected $fillable = [
    	'id_user',
    	'id_medico',
    ];
}
