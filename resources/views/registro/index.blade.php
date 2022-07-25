@extends('layouts.app')

@section('content')

<div class="container-sm">

  <form action="{{ route('registro.index') }}" method="get">
    @csrf
    <div class="btn-group">
      <input type="text" name="buscar" class="form-control">
      <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
  </form>
  
<br>
    <a href="/registro/create">Nuevo</a>
    <button class="btn btn-primary" onclick="location.href='{{ route('registro.create') }}'">Nuevo</button>
 
    <table class="table table-dark table-hover table-responsive">
        <thead>

          <tr>  
            <th scope="col">#</th>
            <th scope="col">Documento</th>
            <th scope="col">Tipo</th>
            <th scope="col">Acciones</th>
          </tr>
        
        </thead>
        <tbody>
            @foreach ($registro as $registros)
          <tr>
            <th scope="row">{{$registros->id}}</th>
            <td>{{$registros->numero_documento}} </td>
            <td>{{$registros->tipo}}</td>
            <td><a href="/registro/{{$registros->id}}/edit" class="btn btn-warning">Editar</a>
                <form action="{{ route('registro.destroy', $registros) }}" method="POST">
                    @csrf
                    @method('delete')
            <button class="btn btn-danger">Eliminar</button></td>
        </form>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{ $registro->links() }}
      </div>
</div>

@endsection

