@extends('layouts.app')

@section('content')

<div class="container">
<div class="form-control w-100 m-auto" style="background-color: var(--bs-warning-border-subtle);">
<div class="card-header" >   
                        <div class="text-center">
                            <h1>NUEVA ENTREGA</h1>
                        </div>
                    </div>
                    <hr>
                    @if ( session('mensaje') )
                   <div class="alert alert-success">{{ session('mensaje') }}</div>
                    @endif
                    <div id="container" class="container-fluid">
                    <form id="myForm" action="{{ route('entrega.store') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <table id="employee-table" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>MEDIAMENTO
          </th>
          <th>CANTIDAD
          </th>
          <th>FORMATO
          </th>
          <!-- <th>Acción
          </th> -->
          <th scope="col"><svg id="icon-add-rows-nuevo-pedido" width="20" height="20" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" style="color:green; cursor: pointer;">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
          <!-- <i class="bi bi-plus-circle-fill"></i> <i id="icon-add-rows-nuevo-pedido" class="fa-plus-circle fa-2x" style="color:green; cursor: pointer;"></i> -->
                                            </th>
        </tr>
        </thead>

        <tbody>
        <tr>
<td>
          
                                               
          <div class="col-md-12">
          <select id="tipoinsumo" name="tipoinsumo[]" class="chosen-select tipoinsumo form-select" data-placeholder="Seleccione Tipo de médicamento...">
               <option>Seleccione...</option>
               @foreach($insumos as $id)
               <option value="{{ $id->id_insumos}}">{{ $id->cod_insumo}} | {{ $id->tipoin->nombre_insumo}} | {{ $id->concentracion_insumo}} {{ $id->unidad->unidad}} | {{ $id->formato->formato}}</option>
             @endforeach
             </select>
              <!-- <span class="invalid-feedback">
                  <strong id="error-I_Insumo_SoftlandP" class='strong-default'></strong>
              </span>                                                                      -->

          </div>
  
</td>
          <td><input type="number"  name="Ip_Cantidad[]" id="Ip_Cantidad" class="form-control Ip_Cantidad" value=1 pattern="[1-9]\d*" min="1" required></td>
          <td><input type="text" name="Ip_Medida[]" id="Ip_Medida" class="form-control Ip_Medida" readonly></td>
          <td>
          <svg class="icon-sub-row-nuevo-pedido" width="20" height="20" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16" style="color: red; cursor: pointer;">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg></td>
        </tr>
      </tbody>
      </table>


                            <div class="mb-3">
  <label for="Pe_Observaciones" class="form-label"><b>OBSERVACIONES</b></label>
  <textarea class="form-control" id="Pe_Observaciones" name="Pe_Observaciones" rows="2"></textarea>
</div>

      <div class="form-group row mb-0">
                                <div class="col-md-9">
                                    <button type="submit" style="background-color: #387C2B" class="btn btn-success btn-lg btn-block">
                                       Entregar
                                    </button>
                                </div>
                            </div>
                            </form>
    </div>
</div>
                </div>
@endsection
