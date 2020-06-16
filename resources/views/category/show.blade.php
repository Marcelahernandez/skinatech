@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Categoria : {{$category->name}}</h2>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if($category->padre == 0)
                <li class="breadcrumb-item"><a href="{{ url('category') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subcategorias</li>
            @endif
            @if($category->padre != 0)
                <li class="breadcrumb-item"><a href="{{ url('category') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subcategorias</li>
            @endif
        </ol>
    </nav>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{$category->name}}</h5>
            <p class="card-text">
            <label style="font-weight:bold">Estado: </label>
            @if($category->status == 1)
                Activo
            @endif

            @if($category->status == 2)
                Inactivo
            @endif
            </p>
        </div>
    </div>
</div>
@endsection