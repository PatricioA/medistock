@extends('layouts.app')

@section('content')



<div class="">
    <div class="">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Listado de Medicamentos</h1>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary" href="{{ route('insumoscrea')}}">Nuevo Medicamento</a>
                    </div>
                   <hr>
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Código</th>
                                    <th>Medicamento</th>
                                    <th>Laboratorio</th>
                                    <th>Clasificación</th>
                                    <th>Presentación</th>
                                    <th>Formato</th>
                                    <th>Concentración</th>
                                    <th>Contenido</th>
                                    <th>Estado</th>
                                    <th>Stock</th>
                                    <th>Stock Minimo</th>
                                    <th>Ingresado Por</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($insumos as $insumo)
                                    <tr>
                                        <td>{{$insumo->id_insumos}}</td>
                                        <td class="text-nowrap">{{$insumo->cod_insumo}}</td>
                                        <td class="text-nowrap">{{$insumo->tipoin->nombre_insumo}}</td>
                                        <td class="text-nowrap">{{$insumo->laboratorio->laboratorio}}</td>
                                        <td class="text-nowrap">{{$insumo->tipoin->clasin->clasificacion}}</td>
                                        <td class="text-nowrap">{{$insumo->presentacion->presentacion}}</td>
                                        <td class="text-nowrap">{{$insumo->formato->formato}}</td>
                                        <td class="text-nowrap">{{$insumo->concentracion_insumo}} {{$insumo->unidad->unidad}}</td>
                                        <td class="text-nowrap">{{$insumo->cantidad_envase}} {{$insumo->medida_insumoM}}</td>
                                        <td class="{{$insumo->estados->e_color}}">{{$insumo->estados->estado}}</td>
                                        <td class="p-3 mb-2 bg-warning text-dark">{{$insumo->stock}}</td>
                                        <td class="p-3 mb-2 bg-danger-subtle">{{$insumo->stock_min}}</td>
                                        <td class="text-nowrap">{{$insumo->usuariocrea->name}}</td>
                                        <td>
                                            <div class="btn-group">
                                                @if($insumo->id_estado ==1)
                                                <a class="btn btn-warning" href="#"></i> 
                                                   Editar
                                                </a>
                                                <a class="btn btn-danger anular" href="{{ route('insumo.anular', $insumo) }}" data-nombre="{{$insumo->tipoin->nombre_insumo}} en {{$insumo->presentacion->presentacion}}">Baja</a>
                                                <a class="btn btn-info devolver" href="{{ route('devolver.crea', $insumo) }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg></a>
                                            </div>
                                            @else
                                            <a class="btn btn-dark activar" href="{{ route('insumo.activar', $insumo) }}" data-nombre="{{$insumo->tipoin->nombre_insumo}} en {{$insumo->presentacion->presentacion}}">Activar</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a class="btn btn-success" href="{{ route('insumos.export')}}">Exportar a Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection