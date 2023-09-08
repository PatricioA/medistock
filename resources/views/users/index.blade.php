@extends('layouts.app')

@section('content')
@include('users.mdl-nuevo-usuario')

    <div class="">
    <div class="">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h1>Lista de usuarios</h1>
                </div>
                <div class="card-body">
                    <div class="btn-group">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdl-nuevo-usuario" data-bs-whatever="@mdo">Nuevo Usuario</button>
                    </div>
                   <hr>
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Fecha Creación</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td class="text-nowrap">{{$user->name}}</td>
                                        <td class="text-nowrap">{{$user->email}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-warning" href="{{ route('usuario.editar', $user ) }}"></i> 
                                                   Editar
                                                </a>
                                                <button type="button" class="btn btn-danger btn-ocultar-usuario" value=""></i> 
                                                   Ocultar
                                                </button>
                                                <button type="button" class="btn btn-primary btn-restart-password-usuario" value=""></i> 
                                                    Contraseña
                                                </button>
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