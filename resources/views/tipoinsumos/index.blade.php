@extends('layouts.app')

@section('content')

    <div class="">
    <div class="">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Lista de Tipos de Insumos</h1>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary" href="{{ route('insumos.tipocrea') }}">Nuevo Tipo</a>
                    </div>
                   <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Indicaciones Insumo</th>
                                    <th>Clasificación</th>
                                    <th>Fecha Creación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tipoIn as $tipo)
                                    <tr>
                                        <td>{{$tipo->cod_insumo}}</td>
                                        <td class="text-nowrap">{{$tipo->nombre_insumo}}</td>
                                        <td>{{$tipo->indicaciones_insumo}}</td>
                                        <td class="text-nowrap">{{$tipo->clasin->clasificacion}}</td>
                                        <td>{{$tipo->created_at}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection