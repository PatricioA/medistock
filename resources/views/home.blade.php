

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="opacity: .7;">
                <div class="card-body msj-bienvenida">
                    <h1>
                    <?php
                        date_default_timezone_set('America/Santiago');
                        $hora = \Carbon\Carbon::now()->format('H');
                        if(($hora >= 0) AND ($hora < 6)){
                            $mensaje = "BUENA MADRUGADA";
                        }
                        if(($hora >= 6) AND ($hora < 12)){
                            $mensaje = "BUENOS DIAS";
                        }
                        if (($hora >= 12) AND ($hora < 18)){
                            $mensaje = "BUENAS TARDES";
                        }
                        if(($hora >= 18) AND ($hora <= 23)){
                            $mensaje = "BUENAS NOCHES";
                        }
                        echo $mensaje;
                    ?>
                    <br>
                    BIENVENIDO AL SISTEMA
                    <br>DE INVENTARIO MÉDICO
                    <br>MEDISTOCK
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
