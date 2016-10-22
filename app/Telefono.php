<?php

namespace ConsulNet;

use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    protected $table = 'telefonos';

    protected $fillable = [
    	'tipo',
    	'tel',
    	'id_user',    	
    ];
}
