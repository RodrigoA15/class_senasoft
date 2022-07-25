@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('empleado.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
              </div>
            <div class="mb-3">
              <label for="" class="form-label">Identificacion</label>
              <input type="number" class="form-control" id="identificacion" name="identificacion">
            </div>
            <div class="mb-3">
              <label class="form-label">Direccion</label>
              <input type="text" class="form-control" id="direccion" name="direccion">
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <input type="text" class="form-control" id="rol" name="rol">
              </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection