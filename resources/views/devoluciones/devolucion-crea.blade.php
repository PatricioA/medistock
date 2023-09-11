@extends('layouts.app')
@section('content')

<div class="container">
                <div class="card" >
                <div class="card-header">   
                        <div class="text-center">
                            <h1>Devolver Médicamento {{ $devolverIn->id_insumos }} </h1>
                        </div>
                    </div>
                    @if ( session('mensaje') )
    <div class="alert alert-success">{{ session('mensaje') }}</div>
@endif


                    <div class="card-body">
                <form action="{{ route('devolver.update', $devolverIn->id_insumos)  }}" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="mb-3 mt-3">
    <div class="row g-3">
  <div class="col">
  <label for="inputEmail4" class="form-label">Tipo Médicamento:</label>
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{$devolverIn->tipoin->nombre_insumo}}" disabled readonly>
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Presentación:</label>
    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="{{$devolverIn->presentacion->presentacion}}" disabled readonly>
  </div>
</div>
</div>
    <div class="mb-3 mt-3">
    <div class="row g-3">
  <div class="col">
  <label for="inputEmail4" class="form-label">Concentración:</label>
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{ $devolverIn->concentracion_insumo}} {{ $devolverIn->unidad->unidad}}" disabled readonly>
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Contenido:</label>
    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="{{ $devolverIn->cantidad_envase}} {{ $devolverIn->medida_insumoM}}" disabled readonly>
  </div>
</div>
</div>
<div class="mb-3 mt-3">
    <div class="row g-3">
  <div class="col">
  <label for="inputEmail4" class="form-label">Stock Actual:</label>
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" value="{{ $devolverIn->stock}}" disabled readonly>
  </div>
  <div class="col">
  <label for="inputEmail4" class="form-label">Cantidad a Descontar:</label>
    <input type="number" class="form-control" placeholder="0" aria-label="Last name" name="descontar" id="descontar" value="{{ old('descontar') }}" required>
    @if ($errors->any())
        <div class="help-block">
            <span>
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
            </span>
        </div>
    @endif
    @if (session('error'))
        <div class="help-block">
        <span>
        <strong> {{ session('error') }} </strong>
        </span>
        </div>
    @endif
  </div>
</div>
<div class="mb-3 mt-3">
<div class="input-group">
  <span class="input-group-text">Observación</span>
  <textarea class="form-control" name="obs" id="obs" aria-label="With textarea" value="{{ old('obs') }}"  required ></textarea>
</div>
</div>
    <button class="btn btn-warning btn-block" type="submit">Devolver</button>
    <a type="button" class="btn btn-dark" href="{{ url()->previous() }}">Volver</a>
  </form>
  </div> 
</div>
</div>


@endsection