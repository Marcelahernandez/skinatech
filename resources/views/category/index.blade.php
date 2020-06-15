@extends('layouts.app')
@section('content')
<div class="alert alert-info" role="alert">
    <div class="container">
        <div class="row">
            <div class="col-9">
                @if(!$id)
                    <h2>Categorias</h2>
                @endif   
                @if($id) 
                    <h2>Subcategorias</h2>
                @endif
            </div>
            <div class="col-3">
                @if(!$id)
                    <a style="float:right" href="{{ url('category/create') }}"><button type="button" class="btn btn-primary">Crear </button></a>
                @endif
                @if($id)
                    <a style="float:right" href="{{ url('category/create',$id) }}"><button type="button" class="btn btn-primary">Crear </button></a>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if(!$id)
                <li class="breadcrumb-item"><a href="#">Categorias</a></li>
            @endif
            @if($id)
                <li class="breadcrumb-item"><a href="{{ url('category') }}">Categorias</a></li>
                <li class="breadcrumb-item active" aria-current="page">Subcategorias</li>
            @endif
        </ol>
    </nav>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                @if(!$id)
                    <th></th>
                @endif    
                <th scope="col">Nombre</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category as $category)
                <tr>
                    <th><a href="{{ url('category/edit',$category->id) }}" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fas fa-pencil-alt"></i></a></th>
                    <th><a href="{{ url('category/delete',$category->id) }}"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Eliminar"></i></a></th>
                    @if(!$id)
                        <th><a href="{{ url('category',$category->id) }}"><i class="fas fa-layer-group" data-toggle="tooltip" data-placement="top" title="Subcategorias"></i></a></th>
                    @endif
                    <td>{{$category->name}}</td>
                    <td>
                        @if($category->status == 1)
                            Activo
                        @endif
                        @if($category->status == 2)
                            Inactivo
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection