<?php
namespace App\Http\Controllers;
use App\Insumos;
use App\PedidoDetalle;
use App\TipoInsumo;
use App\Pedidos;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Jobs\CreatePedido;
use Illuminate\Support\Facades\Notification;
Use App\Notifications\SendPedido;

use Illuminate\Http\Request;

class PedidosController extends Controller
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
        $pedidos = Pedidos::all();
        return view('pedidos.index', compact('pedidos'));
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
        return view('pedidos.nuevopedido', compact('tipoin','insumos'));

                // Simulando una consulta a la base de datos para obtener opciones
               
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = new Pedidos();
        $pedido->id_estado = 1;
        $pedido->observacion_pedido	 = $request->Pe_Observaciones;
        $pedido->id_user = auth()->user()->id;
        $pedido->save();
    
        $nombres = $request->input('tipoinsumo');
        $valores = $request->input('Ip_Cantidad');

        $datosArray = [];
        
        foreach ($nombres as $index => $nombre) {
            $datosArray[] = [
                'id_pedido' => $pedido->id_pedido,
                'id_insumo' => $nombre,
                'cantidad_producto' => $valores[$index],
            ];
        }

        PedidoDetalle::insert($datosArray);

        Notification::route('mail', 'proveedor@laravel.com')->notify(new SendPedido());

        return back()->with('mensaje', 'El Pedido se ha Creado y Enviado Con Éxito !!!');

    }

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
        
        $notaEliminar = Pedidos::findOrFail($id);
        $notaEliminar->id_estado= 5;
        $notaEliminar->save();

        return back()->with('mensaje', 'Pedido Anulado con éxito');
    }

    public function getOptions()
    {
        // Simulando una consulta a la base de datos para obtener opciones
        // $datos  = PedidoDetalle::all();

        // return response()->json($datos);
        $tipoin = TipoInsumo::selectRaw("CONCAT(cod_insumo, ' - ', nombre_insumo) as tipoin")->get();
        // $tinsumo = TipoInsumo::select(DB::raw("concat(cod_insumo, '-' , nombre_insumo"))->pluck('cod_insumo','nombre_insumo');
        return response()->json($tipoin);
    }

    public function selectDB(Request $request)
{
        $selectedValue = $request->input('tipoinsumo');

        // dd($selectedValue);
        // Consultar la base de datos para obtener la información basada en $selectedValue
        $informacion = Insumos::where('cantidad_envase', $selectedValue)->first();

        return response()->json($informacion);
    }

    // public function selectDB(Request $request){
        
    // $insumosaldo = Insumos::where('id_insumos',$request->CodProd)->whereIn('ID_Estado',[1,4])->sum('I_Unidades_Saldo');

    // $condumed = Insumo_Softland::where('CodProd',$request->CodProd)->first();

    // return ['insumosaldo'=>$insumosaldo,'CodUMed'=>$condumed];

    //return $insumosaldo;
// }

public function verPedidos($id)
{
    $pedidosVer = Pedidos::findOrFail($id);
    $pedidoDetalle = PedidoDetalle::where('id_pedido','=',$id)->get();
    return view('pedidos.pedidos-ver', compact('pedidosVer', 'pedidoDetalle'));
}
}
