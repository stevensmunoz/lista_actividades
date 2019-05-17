@extends('layouts.app')

@section('content')
{{-- <h1 class="text-center">Categoria</h1> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif
            <div class="card card-new-actividades">
                <div class="card-header">Nueva Categoria</div>
                <div class="card-body">
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Titulo</label>
                                    <input id="titulo" name="titulo" type="text" maxlength="255" value="{{ old('titulo') }}" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" autocomplete="off" placeholder="Titulo de la categoria"/>
                                    @if ($errors->has('titulo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('titulo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="estado" value="0" class="form-control">
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                {{-- <a href="{{ url()->previous()}} " class="btn btn-danger">Atras</a> --}}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             <div class="card">
                <div class="card-header">Lista Categoria</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                <th scope="row">{{ $categoria->id }}</th>
                                <td>{{ $categoria->titulo}}</td>
                                <td>
                                    <a href="{{ route('categorias.edit',$categoria->id) }}" class="btn-sm btn-success mt-3"><i class="far fa-edit"></i></a>
                                    {{-- BOTON DE BORRAR --}}
                                    {{-- <form action="{{ route('categorias.destroy',$categoria->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm btn-danger mt-3" onclick="return confirm('Quiere borrar el registro')" ><i class="far fa-trash-alt"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                     {{ $categorias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
