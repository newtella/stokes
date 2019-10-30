@extends('layouts.panel')
@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <h3 class="mb-0">Registrar nueva cita</h3>
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
      <form action="{{ url('appointments')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="description">Descripcion</label>
          <input type="text" name="description" id="description" class="form-control" value="{{old('description')}}" placeholder="Describe brevemente la consulta" required>
        </div>
        <div class="form row">
          <div class="form-group col-md-6">
            <label for="specialty">Especialidad</label>
            <select class="form-control" name="specialty_id" id="specialty" required>
              <option value="">Seleccionar Especialidad</option>
              @foreach ($specialties as $specialty)
                <option value="{{$specialty->id}}" 
                @if (old('specialty_id') == $specialty->id)
                  selected
                @endif>{{$specialty->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group col-md-6">
            <label for="doctor">Medico</label>
            <select class="form-control" name="doctor_id" id="doctor" required>
              @foreach ($doctors  as $doctor)
                <option value="{{$doctor->id}}" 
                @if (old('doctor_id') == $doctor->id)
                  selected
                @endif>{{$doctor->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="date">Fecha</label>
          <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input id="date" name="scheduled_date" class="form-control datepicker" placeholder="Select date" 
            type="text" value="{{old('scheduled_date', date('Y-m-d'))}}"
            data-date-format="yyyy-mm-dd" 
            data-date-start-date="{{date('Y-m-d')}}" 
            data-date-end-date="+30d">
          </div>
        </div>
        <div class="form-group">
          <label for="appointmenthour">Hora de la cita</label>
          <div id="hours">
            @if ($intervals)
              @foreach ($intervals['morning'] as $key => $interval)
                <div class="custom-control custom-radio mb-3">
                  <input name="scheduled_time" value="{{$interval['start']}}" class="custom-control-input" id="intervalMorning{{$key}}" type="radio" required>
                  <label class="custom-control-label" for="intervalMorning{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                </div>
              @endforeach
              @foreach ($intervals['afternoon'] as $key => $interval)
                <div class="custom-control custom-radio mb-3">
                  <input name="scheduled_time" value="{{$interval['start']}}" class="custom-control-input" id="intervalAfternoon{{$key}}" type="radio" required>
                  <label class="custom-control-label" for="intervalAfternoon{{$key}}">{{$interval['start']}} - {{$interval['end']}}</label>
                </div>
              @endforeach
            @else
              <div class="alert alert-info" role="alert">
                Selecciona un medico y una fecha para ver los horarios disponibles.
              </div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="type">Tipo de consulta</label>
          <div class="custom-control custom-radio mb-3">
            <input class="custom-control-input" type="radio" value="Consulta" name="type" id="type1"
            @if (old('type', 'Consulta') == 'Consulta')
            checked
            @endif>
            <label class="custom-control-label" for="type1">Consulta</label>
          </div>
          <div class="custom-control custom-radio mb-3">
            <input class="custom-control-input" type="radio" name="type" id="type2"
            @if (old('type') == 'Examen')
              checked
            @endif value="Operacion">
            <label class="custom-control-label" for="type2">Examen</label>
          </div>
          <div class="custom-control custom-radio mb-3">
            <input class="custom-control-input" type="radio" name="type" id="type3"
            @if (old('type') == 'Operacion')
              checked
            @endif value="Examen">
            <label class="custom-control-label" for="type3">Operacion</label>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script src="{{asset('/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('/js/appointments/create.js')}}"></script>
@endsection