@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Edicion  de Categorias</h2>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<div class="container">
<nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            
        </ol>
    </nav>
<form action="{{ url('category/update',$category->id) }}" method="POST">
    {{csrf_field() }}
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{$category->name}}">
    </div>
    
    <div class="form-group">
        <label>Estado</label>
        <select class="custom-select" name="estado">
            <option >Seleccionar</option>
            <option value="1" @if($category->status == 1)selected @endif>Activo</option>
            <option value="2" @if($category->status == 2)selected @endif>Inactivo</option>
        </select>
    </div>
    <input type="hidden" name="padre" value="{{$category->padre}}">
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
    
</div>
@endsection