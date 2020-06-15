@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Creación de usuarios</h2>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Creación de usuarios</li>
  </ol>
</nav>
<form action="{{url('users/store')}}" method="POST">
    {{csrf_field() }}
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
    <div class="form-group">    
        <label>Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>Rol</label>
        <select class="custom-select" name="rol">
            <option selected>Seleccionar</option>
            <option value="1">Administrador</option>
            <option value="2">Basico</option>
        </select>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <select class="custom-select" name="estado">
            <option selected>Seleccionar</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
    
</div>
@endsection