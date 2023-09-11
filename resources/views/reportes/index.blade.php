@extends('layouts.app')

@section('content')



<div class="">
    <div class="">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>REPORTE - Stock vs Entregas</h1>
                </div>
                    <div class="table-responsive">
                        <table class="table table-success table-striped-columns" style="width:100%">
                            <thead>
                                <tr>
                                    
                                    <!-- <th>N°</th> -->
                                    <th>TIPO MÉDICAMENTO</th>
                                    <th>STOCK MINIMO</th>
                                    <th>STOCK ACTUAL</th>
                                    <th>TOTAL ENTREGAS</th>
                                    <th>%</th>
                                    <th>ESTADO</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($report as $rep)
                                    <tr>
                                        <td>{{$rep->NOMBRE_INSUMO}} - {{$rep->PRESENTACION}} - {{$rep->CONCENTRACION}} {{$rep->UNIDADES}}</td>
                                        <td>{{$rep->STOCK_MIN}}</td>
                                        <td>{{$rep->STOCK}}</td>
                                        <td>{{$rep->cantidad}}</td>
                                        <td>{{number_format($rep->PORCENTAJE * 100, 2, ",", ".")." %"}}</td>
                                        @if($rep->STOCK <= $rep->STOCK_MIN )
                                        <td class="table-danger">CRITICO</td>
                                        @else
                                        <td>ACEPTABLE</td>
                                            @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
    </div>
</div>


@endsection