@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                <h2>Productos</h2>
            </div>
            @if(Auth::user()->hasRole('Administrador'))
                <div class="col-3">
                    <a style="float:right" href="{{ url('products/create') }}"><button type="button" class="btn btn-primary">Crear</button></a>
                </div>
            @endif    
        </div>
    </div>
</div>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Productos</a></li>
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                @if(Auth::user()->hasRole('Administrador'))
                    <th></th>
                    <th></th>
                @endif
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Imagen</th>
              
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
            <th><a href="{{ url('products/show',$product->id) }}" data-toggle="tooltip" data-placement="top" title="Ver"><i class="far fa-eye"></a></i></th>
                @if(Auth::user()->hasRole('Administrador'))
                    <th><a href="{{ url('products/edit',$product->id) }}"><i class="fas fa-pencil-alt"></i></a></th>
                    <th><a href="{{ url('products/delete',$product->id) }}"><i class="fas fa-trash-alt"></i></a></th>
                @endif    
                <th scope="row">{{$product->id}}</th>
                <td>{{$product->name}}</td>
                <td><img src="{{$product->image}}" width="60"></td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection