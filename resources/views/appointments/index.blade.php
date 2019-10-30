@extends('layouts.panel')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <h3 class="mb-0">Mis Citas</h3>
    @if($role == 'patient')
    <div class="col text-right">
      <a href="{{ url('appointments/create')}}" class="btn btn-sm btn-success">Nueva Cita</a>
    </div>
    @endif
  </div>
  <div class="card-body">
    @if (session('notification'))
      <div class="alert alert-success" role="alert">
        {{session('notification')}}
      </div>  
    @endif
    <div class="nav-wrapper">
      <ul class="nav nav-pills" id="tabs-icons-text" role="tablist">
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#confirmed-appointments" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-check-bold mr-2"></i>Mix Proximas Citas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#pending-appointments" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Citas por confirmar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#old-appointments" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false"><i class="ni ni-book-bookmark mr-2"></i>Historial de citas</a>
        </li>
      </ul>
    </div>
    <div class="card shadow">
      <div class="card-body">
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="confirmed-appointments" role="tabpanel" aria-labelledby="confirmed-appointments">
            @include('appointments.tables.confirmed')          
          </div>
          <div class="tab-pane fade" id="pending-appointments" role="tabpanel" aria-labelledby="pending-appointments">
            @include('appointments.tables.pending')
          </div>
          <div class="tab-pane fade" id="old-appointments" role="tabpanel" aria-labelledby="pending-appointments">
            @include('appointments.tables.old')
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection