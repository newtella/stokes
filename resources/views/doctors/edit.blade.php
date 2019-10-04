@extends('layouts.panel')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <h3 class="mb-0">Editar Medico</h3>
    <div class="col text-right">
      <a href="{{ url('doctors')}}" class="btn btn-sm btn-primary">Cancelar y volver</a>
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
      <form action="{{ url('doctors/'.$doctor->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Nombre del medico</label>
          <input type="text" name="name" class="form-control" value="{{old('name', $doctor->name)}}" required>
        </div>
        <div class="form-group">
            <label for="email">E-Mail</label>
            <input type="text" name="email" class="form-control"  value="{{old('email', $doctor->email)}}" required>
        </div>
        <div class="form-group">
            <label for="dpi">DPI</label>
            <input type="text" name="dpi" class="form-control"  value="{{old('dpi', $doctor->dpi)}}">
        </div>
        <div class="form-group">
            <label for="address">Direccion</label>
            <input type="text" name="address" class="form-control"  value="{{old('address', $doctor->address)}}">
        </div>
        <div class="form-group">
            <label for="phone">Telefono</label>
            <input type="text" name="phone" class="form-control"  value="{{old('phone', $doctor->phone)}}">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="text" name="password" class="form-control">
            <p class="text-danger">*Ingrese una contraseña solo si desea actualizarla*</p>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection