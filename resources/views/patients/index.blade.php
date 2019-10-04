@extends('layouts.panel')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <h3 class="mb-0">Pacientes</h3>
    <div class="col text-right">
      <a href="{{ url('patients/create')}}" class="btn btn-sm btn-success">Nuevo paciente</a>
    </div>
  </div>
  <div class="card-body">
    @if (session('notification'))
      <div class="alert alert-success" role="alert">
        {{session('notification')}}
      </div>  
    @endif
  </div>
  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">E-mail</th>
          <th scope="col">DPI</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($patients as $patient)
        <tr>
          <th scope="row">
            {{ $patient->name }}
          </th>
          <td>
            {{ $patient->email }}
          </td>
          <td>
            {{ $patient->dpi }}
          </td>
          <td>
            <form action="{{ url('patients/'.$patient->id)}}" method="POST">
              @csrf
              @method('DELETE')
              <a href="{{ url('patients/'.$patient->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
          @endforeach
        </tr>
      </tbody>
    </table>
    <div class="card-body">
      {{$patients->links()}}
    </div>
  </div>
</div>
@endsection