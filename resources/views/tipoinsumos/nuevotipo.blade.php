@extends('layouts.app')
@section('content')

<div class="container">
                <div class="card" >
                <div class="card-header">   
                        <div class="text-center">
                            <h1>Nuevo Tipo</h1>
                        </div>
                    </div>
                    <div class="card-body">
                <form action="{{ route('insumos.tipostore') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="mb-3 mt-3">
      <label for="nombre" class="fxorm-label">Nombre Tipo Medicamento:</label>
      <input type="text" name="nombreTipo" placeholder="Nombre" class="form-control mb-2"> 
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Indicaciones:</label>
      <input type="text" name="indicacionesTipo" placeholder="Indicaciones" class="form-control mb-2">
    </div>
    <div class="md-3">
    <label for="unidad" class="form-label">Clasificación</label>
    <select id="clasificacion" name="clasificacion" class="form-select">
    <option selected>Seleccione...</option>
    @foreach($clas as $cla)
      <option value="{{ $cla->id_clasificacion }}">{{ $cla->clasificacion }}</option>
    @endforeach
    </select>
  </div>
    <button type="submit" class="btn btn-primary">GUARDAR</button>
  </form>
  </div> 
</div>
</div>


@endsection