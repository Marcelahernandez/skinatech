@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Usuarios</h2>
            </div>
            @if(Auth::user()->hasRole('Administrador'))
                <div class="col-3">
                    <a style="float:right" href="{{ url('users/create') }}"><button type="button" class="btn btn-primary">Crear</button></a>
                </div>
            @endif    
        </div>
    </div>
</div>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                @if(Auth::user()->hasRole('Administrador'))
                <th></th>
                <th></th>
                @endif
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                @if(Auth::user()->hasRole('Administrador'))
                    <th><a href="{{ url('users/edit',$user->id) }}"><i class="fas fa-pencil-alt"></i></a></th>
                    <th><a href="{{ url('users/delete',$user->id) }}"><i class="fas fa-trash-alt"></i></a></th>
                @endif
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if($user->rol == 1)
                        Administrador
                    @endif
                    @if($user->rol == 2)
                        Basico
                    @endif
                </td>
                <td>
                 @if($user->status == 1)
                        Activo
                    @endif
                    @if($user->status == 2)
                        Inactivo
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection