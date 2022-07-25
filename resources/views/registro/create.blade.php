@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/registro" method="POST">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Documento</label>
          <input type="number" class="form-control" id="numero_documento" name="numero_documento">
          
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Tipo</label>
          <input type="number" class="form-control" id="tipo" name="tipo">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>   
    </div>    
@endsection