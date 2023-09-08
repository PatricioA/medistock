<?php

namespace App\Http\Controllers;
use App\TipoInsumo;
use App\Clasificacion;

use Illuminate\Http\Request;

class TipoinsumoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tipoIn = TipoInsumo::all();
         return view('tipoinsumos.index', compact('tipoIn'));
    }

    public function create()
    {
        $clas = Clasificacion::all();
        return view('tipoinsumos.nuevotipo', compact('clas'));

                // Simulando una consulta a la base de datos para obtener opciones
               
    }

    public function store(Request $request)
    {
        $tipoIn = new TipoInsumo();
        $tipoIn->nombre_insumo = $request->nombreTipo;
        $tipoIn->indicaciones_insumo = $request->indicacionesTipo;
        $tipoIn->id_clasificacion = $request->clasificacion;
        $tipoIn->save();
        return back()->with('mensaje', 'Nuevo Tipo se ha Ingresado Con Éxito !!!');
    }
}
