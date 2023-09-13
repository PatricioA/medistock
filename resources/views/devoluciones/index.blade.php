@extends('layouts.app')

@section('content')

    <div class="">
    <div class="">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Historial de Devoluciones</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Código Devolución</th>
                                    <th>Insumo</th>
                                    <th>Cantidad Devuelta</th>
                                    <th>Observación</th>
                                    <th>Fecha Devolución</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Devoluciones as $dev)
                                    <tr>
                                        <td>{{$dev->id_devolucion}}</td>
                                        <td class="text-nowrap">{{$dev->id_insumo}}</td>
                                        <td>{{$dev->cantidad_devolucion}}</td>
                                        <td class="text-nowrap">{{$dev->observación_devolucion}}</td>
                                        <td>{{$dev->fecha_devolucion}}</td>
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