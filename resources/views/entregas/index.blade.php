@extends('layouts.app')

@section('content')



<div class="">
    <div class="">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Historial de Entregas</h1>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary" href="{{ route('entrega.crea')}}">Nueva Entrega</a>
                    </div>
                   <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered datatable_desc2" style="width:100%">
                            <thead>
                                <tr>
                                    
                                    <th>N° Entrega</th>
                                    <th>Entregado Por</th>
                                    <th>Fecha Entrega</th>
                                    <th>Cantidad</th>
                                    <th>Tipo Medicamento</th>
                                    <th>Presentación</th>
                                    <th>Concentración</th>
                                    <th>Entrega</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($entregas as $entrega)
                                    <tr>
                                        
                                        <td>{{$entrega->nentrega}}</td>
                                        <td class="text-nowrap">{{$entrega->usuariocrea->name}}</td>
                                        <td class="text-nowrap">{{\Carbon\Carbon::parse($entrega->created_at)->format('d-m-Y')}}</td>
                                        <td>{{$entrega->cantidad}}</td>
                                        <td class="text-nowrap">{{$entrega->insumo->tipoin->nombre_insumo}}</td>
                                        <td class="text-nowrap">{{$entrega->insumo->presentacion->presentacion}}</td>
                                        <td class="text-nowrap">{{$entrega->insumo->concentracion_insumo}} {{$entrega->insumo->unidad->unidad}}</td>
                                        <td class="text-nowrap">{{$entrega->c_costo}}</td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>


@endsection