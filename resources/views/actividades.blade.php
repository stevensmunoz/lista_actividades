@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card card-new-actividades">
                <div class="card-header">Nueva Actividad</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('actividades.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Titulo</label>
                            <input id="titulo" name="titulo" type="text" maxlength="255" value="{{ old('titulo') }}" class="form-control{{ $errors->has('titulo') ? ' is-invalid' : '' }}" autocomplete="off" />
                            @if ($errors->has('titulo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('titulo') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="title">Categoria</label>
                            <select name="categoria_id" value="{{ old('categoria_id') }}" class="custom-select custom-select form-control{{ $errors->has('categoria_id') ? ' is-invalid' : '' }}">
                                <option>Seleccione una categoria</option>
                                @foreach ($categorias as $categoria)
                                    <option  value="{{$categoria->id}}">{{$categoria->titulo}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('categoria_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('categoria_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            {{-- <a href="{{ url()->previous()}} " class="btn btn-danger">Atras</a> --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Lista Actividades</div>

                <div class="card-body">
                   <table id="tActividades" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                       @foreach ($actividades as $actividad)
                           <tr>
                               <th scope="row">{{$actividad->id}}</th>
                               <td>
                                   @if ($actividad->es_completo)
                                       <s>{{ $actividad->titulo }}</s>
                                   @else
                                       {{ $actividad->titulo }}
                                   @endif
                               </td>
                               <td>

                                   @if ($actividad->es_completo)
                                       <s>{{ $actividad->categoria->titulo }}</s>
                                   @else
                                       {{ $actividad->categoria->titulo }}
                                   @endif
                               </td>
                               <td>

                                   @if (! $actividad->es_completo)
                                       <form method="POST" action="{{ route('actividades.update', $actividad->id) }}">
                                           @csrf
                                           @method('PATCH')
                                           <input type="hidden" name="id" value="{{$actividad->id}}" class="form-control">
                                           <button type="submit" class="btn btn-primary" onclick="return confirm('Quiere completar la actividad')">Completo</button>
                                       </form>
                                   @endif
                                   {{-- BOTON DE BORRAR --}}
                                    <form action="{{ route('actividades.destroy', $actividad->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{$actividad->id}}" class="form-control">
                                        <button type="submit" class="btn-sm btn-danger mt-3" onclick="return confirm('Quiere borrar la actividad')" ><i class="far fa-trash-alt"></i></button>
                                    </form>
                               </td>

                           </tr>
                       @endforeach
                    </tbody>
                   </table>

                    {{ $actividades->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
