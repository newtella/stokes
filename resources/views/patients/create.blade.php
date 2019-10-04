@extends('layouts.panel')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <h3 class="mb-0">Nuevo Paciente</h3>
    <div class="col text-right">
      <a href="{{ url('patients')}}" class="btn btn-sm btn-primary">Cancelar y volver</a>
    </div>
  </div>
  <div class="table-responsive">
    <!-- Projects table -->
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          @foreach($errors->all() as $error)
            <ul>
              <li>
                {{ $error }}
              </li>
            </ul>
          @endforeach
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <form action="{{ url('patients')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nombre del paciente</label>
          <input type="text" name="name" class="form-control" value="{{old('name')}}" required>
        </div>
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input type="text" name="email" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="dpi">DPI</label>
          <input type="text" name="dpi" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">Direccion</label>
          <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
          <label for="phone">Telefono</label>
          <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Contraseña</label>
          <input type="text" name="password" class="form-control" value="{{ str_random(6) }}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection