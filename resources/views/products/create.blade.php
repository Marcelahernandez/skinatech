@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Creación de Productos</h2>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<div class="container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Productos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Creación de productos</li>
  </ol>
</nav>
<form action="{{url('products/store')}}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
    {{csrf_field() }}
   
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" class="form-control" name="nombre">
    </div>
   
  
    <div class="form-group">
        <label>Imagen</label>    
        <input accept="image/*" class="form-control" type="file" name="imagen" >
    </div>

    <div class="form-group">
        <label>Categoria</label>
        <select name="categoria" class="form-control" id="categoria">
            <option value="">Seleccionar</option>
            @foreach($categorias as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Subcategorias</label>
        <select class="custom-select" name="subcategoria[]" id="subcategoria" multiple></select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>
    
</div>
@endsection