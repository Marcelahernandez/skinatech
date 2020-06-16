@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Producto : {{$product->name}}</h2>
            </div>
            <div class="col-3">
            </div>
        </div>
    </div>
</div>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('products') }}">Productos</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
        </ol>
    </nav>
    <div class="card">
        <div align="center">
            <img src="{{ asset($product->image) }}" class="card-img-top" style="max-width:200px">
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$product->name}}</h5>
            <p class="card-text">
                <label style="font-weight: bold">Categoria: </label> {{$categoria->name}} <br/>
                <label style="font-weight: bold">Subcategorias: </label> <br/>
                @foreach($nombreSubcategoria as $nombre)
                    {{$nombre}} <br/>
                @endforeach
            </p>
        </div>
    </div>
</div>
@endsection