<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CuentaEgreso;



class CuentaEgresocontroller extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

}


    
    

