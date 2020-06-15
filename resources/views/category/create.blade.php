@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                @if(!$id)
                <h2>Creación de categorias</h2>
                @endif
                @if($id)
                <h2>Creación de subcategoria</h2>
                @endif
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if(!$id)
                <li class="breadcrumb-item"><a href="#">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Creación de categorias</li>
            @endif
            @if($id)
                <li class="breadcrumb-item"><a href="{{ url('category') }}">Categorias</a></li>
                <li class="breadcrumb-item active">Subcategorias</li>
                <li class="breadcrumb-item active" aria-current="page">Creación de subcategorias</li>
            @endif
        </ol>
    </nav>
    <form action="{{url('category/store')}}" method="POST">
        {{csrf_field() }}
    
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="form-group">
            <label>Estado</label>
            <select class="custom-select" name="estado">
                <option selected>Seleccionar</option>
                <option value="1">Activo</option>
                <option value="2">Inactivo</option>
            </select>
        </div>
        <input type="hidden" name="padre" value="{{$id}}">
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection