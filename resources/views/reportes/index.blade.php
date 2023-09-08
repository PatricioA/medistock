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
                        <table class="table table-success table-striped-columns" style="width:100%">
                            <thead>
                                <tr>
                                    
                                    <!-- <th>N°</th> -->
                                    <th>TIPO MÉDICAMENTO</th>
                                    <th>PRESENTACION</th>
                                    <th>STOCK ACTUAL</th>
                                    <th>TOTAL ENTREGAS</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($report as $rep)
                                    <tr>
                                        
                                        <!-- <td>{{$rep->ID}}</td> -->
                                        <td>{{$rep->NOMBRE_INSUMO}}</td>
                                        <td>{{$rep->PRESENTACION}}</td>
                                        <td>{{$rep->STOCK}}</td>
                                        <td>{{$rep->cantidad}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>


@endsection