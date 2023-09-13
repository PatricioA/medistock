<?php

namespace App\Http\Controllers;
use App\DevolucionInsumos;

use Illuminate\Http\Request;

class DevolucionInsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $Devoluciones = DevolucionInsumos::all();
         return view('devoluciones.index', compact('Devoluciones'));
    }

}
