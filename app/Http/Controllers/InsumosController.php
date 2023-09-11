<?php

namespace App\Http\Controllers;
use App\Insumos;
use App\Laboratorios;
use App\Clasificacion;
use App\Presentacion;
use App\TipoInsumo;
use App\Formatos;
use App\DevolucionInsumos;
use App\EntregaInsumos;
use App\Unidades;
use App\Estado;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportInsumos;

class InsumosController extends Controller
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
        $insumos = Insumos::all();
        return view('insumos.index', compact('insumos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $laboratorios = Laboratorios::where('id_estado',1)->orderby('laboratorio','asc')->get();
        $tinsimos = TipoInsumo::all();
        $clainsumos = Clasificacion::all();
        $preinsumos = Presentacion::all();
        $uninsumos = Unidades::all();
        $forminsumos = Formatos::orderBy('formato', 'asc')->get();
        // $estado = Estado::wherein('id_Estado',[1,3])->get();
        return view('insumos.nuevoinsumo', compact('laboratorios', 'tinsimos','clainsumos','preinsumos','forminsumos','uninsumos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'stockmin' => 'required'
        ]);
        $insumo = new Insumos();
        $insumo->cod_insumo = $request->tipoinsumo;
        $insumo->id_laboratorio = $request->labinsumo;
        $insumo->id_presentacion = $request->preinsumo;
        $insumo->id_formato = $request->formatoin;
        $insumo->concentracion_insumo = $request->concentra;
        $insumo->id_unidad = $request->unidad;
        $insumo->cantidad_envase = $request->cenvase;
        $insumo->medida_insumoM = $request->contenido;
        $insumo->stock = 0;
        $insumo->stock_min = $request->stockmin;
        $insumo->valor_insumo = $request->valoruni;
        $insumo->id_estado = 1;
        $insumo->id_user = auth()->user()->id;
        $insumo->save();
        return back()->with('mensaje', 'Nuevo Insumo Ingresado Con Éxito !!!');
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
        $insumoEliminar = Insumos::findOrFail($id);
        $insumoEliminar->id_estado= 3;
        $insumoEliminar->save();

        return back()->with('mensaje', 'Insumo se ha dado de baja con éxito');
    }

    public function activar($id)
    {
        $insumoEliminar = Insumos::findOrFail($id);
        $insumoEliminar->id_estado= 1;
        $insumoEliminar->save();

        return back()->with('mensaje', 'Insumo se ha activado con éxito');
    }

    public function exportInsumos()
    {
        return Excel::download(new ExportInsumos, 'insumos.xlsx');
    }

    public function devolver($id)
    {
        $devolverIn = Insumos::findOrFail($id);
        return view('devoluciones.devolucion-crea', compact('devolverIn'));
    }

    public function devolverUpdate(Request $request, $id)
    {

        $request->validate([
            'descontar' => 'required|numeric|min:1',
            'obs' => 'required',
        ],
        [
            'descontar.min' => 'El valor debe ser igual o mayor que 1.',
        ]);

        $InsumoDescontar = Insumos::findOrFail($id);

        if ( $request->descontar > $InsumoDescontar->stock) {
            
            return back()->with('error', 'La cantidad ingresada es mayor que el stock actual.');

        }
        else {

            $InsumoDescontar->stock = $InsumoDescontar->stock - $request->descontar;
            $InsumoDescontar->save();

            $NuevaDevolucion = new DevolucionInsumos();
            $NuevaDevolucion->id_insumo = $id;
            $NuevaDevolucion->cantidad_devolucion = $request->descontar;
            $NuevaDevolucion->observación_devolucion = $request->obs;
            $NuevaDevolucion->id_user = auth()->user()->id;
            $NuevaDevolucion->save();
            return back()->with('mensaje', 'La devolución se ha realizado con éxito');
        }

    }

    public function reportevs()
    {
        $report = Insumos::select(
        DB::raw('insumos.id_insumos AS ID'),
        DB::raw('tipo_insumo.nombre_insumo AS NOMBRE_INSUMO'),
        DB::raw('presentacion.presentacion AS PRESENTACION'),
        DB::raw('insumos.concentracion_insumo AS CONCENTRACION'),
        DB::raw('unidades.unidad AS UNIDADES'),
        DB::raw('insumos.stock_min AS STOCK_MIN'),
        DB::raw('insumos.stock AS STOCK'),
        DB::raw('SUM(entrega_insumos.cantidad) cantidad'),
        DB::raw('SUM(entrega_insumos.cantidad) / stock AS PORCENTAJE'))

        ->join('tipo_insumo','insumos.cod_insumo', '=', 'tipo_insumo.cod_insumo')
        ->join('presentacion','insumos.id_presentacion', '=', 'presentacion.id_presentacion')
        ->join('unidades','insumos.id_unidad', '=', 'unidades.id_unidad')
        ->join('entrega_insumos','insumos.id_insumos', '=', 'entrega_insumos.id_insumo')
        ->groupBy('ID','NOMBRE_INSUMO', 'PRESENTACION','CONCENTRACION','UNIDADES', 'STOCK_MIN', 'STOCK')
        ->orderBy('NOMBRE_INSUMO', 'ASC')
        ->get();
                return view('reportes.index')
                ->with('report',$report);
    }
}
