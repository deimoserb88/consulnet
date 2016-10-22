<?php

namespace ConsulNet;

use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{

    protected $table = 'users';

    protected $fillable = ['name', 'nom','email', 'password','priv', ];

    protected $hidden = ['password', 'remember_token', ];

    public function paciente(){
    	return $this->hasOne('ConsulNet\Paciente','id_user','id');
    } 
}
