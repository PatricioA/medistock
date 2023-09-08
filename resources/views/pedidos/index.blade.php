@extends('layouts.app')

@section('content')



<div class="">
    <div class="">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Historial de Pedidos</h1>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                    <a type="button" class="btn btn-primary" href="{{ route('pedidos.crea')}}">Nuevo Pedido</a>
                    </div>
                   <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered datatable_desc2" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nro Pedido</th>
                                    <th>Estado</th>
                                    <th>Observación</th>
                                    <th>Ingresado Por</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($pedidos as $pedido)
                                    <tr>
                                        <td class="font-weight-bold" ><b> {{$pedido->id_pedido}} </b></td>
                                        <td class="{{$pedido->estado->e_color}}">{{$pedido->estado->estado}}</td>
                                        <td class="text-nowrap">{{$pedido->observacion_pedido}}</td>
                                        <td class="text-nowrap">{{$pedido->usuariocrea->name}}</td>
                                        <td class="text-nowrap">{{\Carbon\Carbon::parse($pedido->created_at)->format('d-m-Y H:i:s')}}</td>
                                        <td>
                                        @if($pedido->id_estado == 1)
                                        <div class="btn-group">
                                            
                                            <a class="btn btn-warning" href="{{ route('pedidos.ver', $pedido ) }}"></i> 
                                               Ver Detalle
                                            </a>
                                            <a class="btn btn-danger eliminar" href="{{ route('pedido.anular', $pedido) }}" data-nombre="{{ $pedido->id_pedido }}">Anular</a>
                                        @else
                                            
                                            @endif
                                        </div>
                                            
                                        </td>
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