@extends('layouts.app')

@section('content')


<div class="container">
{{-- <h1 class="text-center">Actualizar Categoria</h1> --}}
{{-- <hr> --}}
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <div class="card card-new-actividades">
                <div class="card-header">Actualizar Categoria</div>
                <div class="card-body">
                    <form action="{{ route('categorias.update',$categoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Titulo</label>
                                    <input type="text" name="titulo" value="{{$categoria->titulo}}" class="form-control" placeholder="Titulo de la Categoria">
                                </div>
                            </div>

                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                                <a href="{{ url()->previous()}} " class="btn btn-danger">Atras</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
