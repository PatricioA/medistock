@extends('layouts.app')

@section('content')

<!-- <div class="p-3 rounded-2" style="background-color: var(--bs-tertiary-color);">&nbsp;</div> -->

<!-- @error('stockin')
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  El Stock es requerido
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->



<div class="container">
<div class="form-control w-100 m-auto" style="background-color: var(--bs-success);">
<div class="card-header" >   
                        <div class="text-center">
                            <h1>NUEVO MEDICAMENTO</h1>
                        </div>
                    </div>
                    <hr>
                    <!-- <select id="inputState" class="chosen-select form-select" tabindex="2" data-placeholder="Seleccione Tipo de médicamento...">-->
<!-- <form class="row g-3"> -->
@if ( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif
<form class="row g-3" action="{{ route('insumos.store') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="col-md-4">
    <label for="tipoinsumo" class="form-label">TIPO MÉDICAMENTO</label>
    <select id="tipoinsumo" name="tipoinsumo" class="chosen-select form-select" tabindex="12" data-placeholder="Seleccione Tipo de médicamento...">
      <option>Seleccione...</option>
      @foreach($tinsimos as $id)
      <option value="{{ $id->cod_insumo }}">{{ $id->cod_insumo }} - {{ $id->nombre_insumo }}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label for="labinsumo" class="form-label">LABORATORIO</label>
    <select id="labinsumo" name="labinsumo" class="form-select">
      <option selected>Seleccione...</option>
      @foreach($laboratorios as $id)
      <option value="{{ $id->id_laboratorio }}">{{ $id->laboratorio }}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-4">
  <label for="preinsumo" class="form-label">PRESENTACIÓN</label>
  <select id="preinsumo" name="preinsumo" class="form-select">
  <option selected>Seleccione...</option>
      @foreach($preinsumos as $pre)
      <option value="{{ $pre->id_presentacion }}">{{ $pre->presentacion }}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label for="formatoin" class="form-label">FORMATO</label>
    <select id="formatoin" name="formatoin" class="form-select">
    <option selected>Seleccione...</option>
      @foreach($forminsumos as $form)
      <option value="{{ $form->id_formato }}">{{ $form->formato }}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-4">
    <label for="stockmin" class="form-label">STOCK MINIMO</label>
    <input type="number" class="form-control" id="stockmin" name="stockmin" value="{{ old('stockmin') }}">
    @if ($errors->has('stockmin'))
  <div class="help-block">
    <span>
      <strong>El Stock minimo es requerido</strong>
    </span>
  </div>
  @endif
  </div>
  <div class="col-md-4">
    <label for="valoruni" class="form-label">PRECIO FRACCIONADO</label>
    <input type="text" class="form-control" id="valoruni" name="valoruni" placeholder="1250" required>
  </div>
  <div class="col-md-3">
    <label for="concentra" class="form-label">CONCENTRACIÓN</label>
    <input type="number" class="form-control" id="concentra" name="concentra" placeholder="500"required>
  </div>
  <div class="col-md-3">
    <label for="unidad" class="form-label">UNIDADES</label>
    <select id="unidad" name="unidad" class="form-select">
    <option selected>Seleccione...</option>
    @foreach($uninsumos as $form)
      <option value="{{ $form->id_unidad }}">{{ $form->unidad }}</option>
    @endforeach
    </select>
  </div>
  <div class="col-md-3">
    <label for="cenvase" class="form-label">CANTIDAD ENVASE</label>
    <input type="number" class="form-control" id="cenvase" name="cenvase" placeholder="50" required>
  </div>
  <div class="col-md-3">
    <label for="contenido" class="form-label">CONTENIDO</label>
    <select id="contenido" name="contenido" class="form-select">
    <option selected>Seleccione...</option>
      <option value="mL">Miligramos</option>
      <option value="L">Litros</option>
      <option value="U">Unidades</option>
    </select>
  </div>
  <!-- <div class="col-md-4">
    <label for="stockin" class="form-label">STOCK INICIAL (envase)</label>
    <input type="number" class="form-control" id="stockin" name="stockin" value="{{ old('stockin') }}">
    @if ($errors->has('stockin'))
  <div class="help-block">
    <span>
      <strong>El Stock es requerido</strong>
    </span>
  </div>
  @endif
  </div>
  <div class="col-12">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  <div class="col-12">
    <button type="submit" class="btn btn-primary">GUARDAR</button>
  </div>
</form>
</div>
                </div>
@endsection