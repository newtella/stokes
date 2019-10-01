@extends('layouts.panel')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <h3 class="mb-0">Nueva Especialidad</h3>
    <div class="col text-right">
      <a href="{{ url('specialties')}}" class="btn btn-sm btn-primary">Cancelar y volver</a>
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
      <form action="{{ url('specialties/'.$specialty->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Nombre de la especialidad</label>
          <input type="text" name="name" class="form-control" value="{{old('name', $specialty->name)}}" required>
        </div>
        <div class="form-group">
          <label for="description">Descripcion</label>
          <input type="text" name="description" class="form-control"  value="{{old('description', $specialty->description)}}">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection