<?php

namespace ConsulNet\Http\Controllers;

use ConsulNet\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        $priv = Auth::user()->priv;
        switch($priv){
            case 0:
            case 1: return view('admin.admin_home');break;
            case 2: return view('medico.medico_home');break;
            case 3: return view('asist.asist_home');break;        
            case 5: 
            default: return view('home');
        }
    }
}
