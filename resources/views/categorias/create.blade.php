@extends('layouts.app')

@section('content')


<div class="container">
<h1 class="text-center">Crear Categoria</h1>
<hr>
<form action="{{ route('categorias.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Titulo:</strong>
                <input type="text" name="titulo" class="form-control" placeholder="Titulo Categoria">
                <input type="hidden" name="estado" value="0" class="form-control">
            </div>
        </div>

        <div class="col-md-12 text-right">
            <button type="submit" class="btn btn-primary">Enviar</button>
            <a href="{{ url()->previous()}} " class="btn btn-danger">Atras</a>
        </div>
    </div>
</form>

</div>

@endsection
