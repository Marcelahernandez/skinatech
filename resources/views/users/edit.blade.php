@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Edicion  de usuarios</h2>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<div class="container">
<form action="{{ url('users/update',$user->id) }}" method="POST">
    {{csrf_field() }}
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$user->name}}">
    </div>
    <div class="form-group">    
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="{{$user->email}}">
    </div>
    <div class="form-group">
        <label>Rol</label>
        <select class="custom-select" name="rol">
            <option>Seleccionar</option>
            <option value="1" @if($user->rol == 1)selected @endif>Administrador</option>
            <option value="2" @if($user->rol == 2)selected @endif>Basico</option>
        </select>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <select class="custom-select" name="estado">
            <option >Seleccionar</option>
            <option value="1" @if($user->status == 1)selected @endif>Activo</option>
            <option value="2" @if($user->status == 2)selected @endif>Inactivo</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    
</div>
@endsection