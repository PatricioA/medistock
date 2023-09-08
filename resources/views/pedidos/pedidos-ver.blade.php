@extends('layouts.app')

@section('content')

<div class="">
    <div class="">

        <div class="container-sm">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Detalles del pedido: {{$pedidosVer->id_pedido}}</h1>
                </div>
                   <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered border-primary" style="width:100%">
                            <thead>
                                <tr>
                                    <th style="text-align:center;">NRO PEDIDO</th>
                                    <th style="text-align:center;">ESTADO</th>
                                    <th style="text-align:center;">OBSERVACIÓN</th>
                                    <th style="text-align:center;">USUARIO CREADOR</th>
                                    <th style="text-align:center;">FECHA CREACIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td style="text-align:center;"><b>{{$pedidosVer->id_pedido}}</b></td>
                                        <td class="text-nowrap" style="text-align:center;">{{$pedidosVer->estado->estado}}</td>
                                        <td class="text-nowrap" style="text-align:center;">{{$pedidosVer->observacion_pedido}}</td>
                                        <td class="text-nowrap" style="text-align:center;">{{$pedidosVer->usuariocrea->name}}</td>                                        
                                        <td style="text-align:center;">{{\Carbon\Carbon::parse($pedidosVer->created_at)->format('d-m-Y')}}</td>
                                    </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered border-primary" style="width:100%">
                            <thead>
                                <tr>
                                <th style="text-align:center;">MEDICAMENTO</th>
                                    <th style="text-align:center;">LABORATORIO</th>
                                    <th style="text-align:center;">PRESENTACIÓN</th>
                                    <th style="text-align:center;">CONCENTRACIÓN</th>
                                    <th style="text-align:center;">CANTIDAD</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pedidoDetalle as $detalle)
                                    <tr>
                                        <td>{{$detalle->insumosdetalle->tipoin->nombre_insumo}}</td>
                                        <td class="text-nowrap">{{$detalle->insumosdetalle->laboratorio->laboratorio}}</td>
                                        <td class="text-nowrap">{{$detalle->insumosdetalle->presentacion->presentacion}}</td>
                                        <td class="text-nowrap">{{$detalle->insumosdetalle->concentracion_insumo}} {{$detalle->insumosdetalle->unidad->unidad}}</td>
                                        <td class="text-nowrap">{{$detalle->cantidad_producto }}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    
                </div>
                <br>
                <button type="button" class="btn btn-primary" id="imprimirBoton">Imprimir Página</button>
            </div>
        </div>
    </div>
</div>

@endsection