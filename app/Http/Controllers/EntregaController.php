<?php

namespace App\Http\Controllers;
use App\Insumos;
use App\EntregaInsumos;
use App\TipoInsumo;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EntregaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregas = EntregaInsumos::all();
        return view('entregas.index', compact('entregas'));
    }

    public function reportevs()
    {
    //   $report =  $resultados = DB::table('entrega_insumos')
    //   ->select('entrega_insumos.id_insumo', 'tipo_insumo.nombre_insumo as NOMBRE_INSUMO', 'presentacion.presentacion as PRESENTACION', 'insumos.stock as STOCK_ACTUAL', DB::raw('SUM(entrega_insumos.cantidad) as CANTIDAD_ENTREGADA'))
    //   ->join('insumos', 'entrega_insumos.id_insumo', '=', 'insumos.id_insumos')
    //   ->join('tipo_insumo', 'insumos.cod_insumo', '=', 'tipo_insumo.cod_insumo')
    //   ->join('presentacion', 'insumos.id_presentacion', '=', 'presentacion.id_presentacion')
    //   ->groupBy('entrega_insumos.id_insumo')
    //   ->get();
  
    //             return view('reportes.index')
    //             ->with('report',$report);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoin = TipoInsumo::all();
        $insumos = Insumos::all();
        return view('entregas.nuevoentrega', compact('tipoin','insumos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         

        $ultimoRegistro = EntregaInsumos::latest()->first();
        $nuevoValor = $ultimoRegistro ? $ultimoRegistro->nentrega + 1 : 1;


        $nombres = $request->input('tipoinsumo');
        $valores = $request->input('Ip_Cantidad');
        $user = auth()->user()->id;

        $datosArray = [];
        
        foreach ($nombres as $index => $nombre) {
            $datosArray[] = [
                'nentrega' => $nuevoValor,
                'id_insumo' => $nombre,
                'cantidad' => $valores[$index],
                'c_costo' => 'PACIENTES',
                'id_user' => $user,
            ];

            $insumoRebajar = Insumos::find($nombre);
            $insumoRebajar->stock -= $valores[$index];
            $insumoRebajar->save();
        }

        EntregaInsumos::insert($datosArray);

        

        // $insumoRebajar = Insumos::all();

        // foreach ($nombres as $index => $nombre) {
        //     if ($insumoRebajar->id_insumos = $nombre) {
        //         $datosArray[] = [  
        //         'stock' => 2,
        //         ];
        //     }
        // }

        return back()->with('mensaje', 'Entrega realizada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
