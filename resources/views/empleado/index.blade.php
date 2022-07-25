@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table table-dark table-responsive">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Numero documento</th>
        <th scope="col">Direccion</th>
        <th scope="col">Rol</th>
        <th scope="col">Acciones</th>


      </tr>
    </thead>
    <tbody>
      @foreach ($empleado as $empleados)
      <tr class="table-active">
        <td>{{ $empleados->nombre }}</td>
        <td>{{ $empleados->identificacion }}</td>
        <td>{{ $empleados->direccion}}</td>
        <td>{{ $empleados->rol }}</td>
        <td> <a href="/empleado/{{ $empleados->id }}/edit" class="btn btn-warning">Editar</a>
          <form action="{{ route('empleado.destroy', $empleados) }}" method="POST">

            @method('DELETE')
            {{ csrf_field() }}
        <button class="btn btn-danger">Eliminar</button></td>
      </form>
      </tr>
      @endforeach
      
      
    </tbody>
  </table>
</div>
@endsection