@extends('layouts.panel')
@section('content')
<div class="card shadow">
    <div class="card-header border-0">
        <h3>¿Esta seguro de cancelar su cita?</h3>
    </div>
    <div class="card-body">
        <form action="" method="post">
        @csrf
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{session('notification')}}
                </div>  
            @endif
            @if ($role == 'patient')
                <p>
                    Estas a punto de cancelar tu cita reservada 
                    con el médico:
                    {{$appointment->doctor->name}} 
                    para el día 
                    {{$appointment->scheduled_date}}
                </p>
            @elseif($role == 'doctor')
                <p>
                    Estas a punto de cancelar tu cita reservada
                    con el paciente:
                    {{$appointment->patient->name}} 
                    para el día 
                    {{$appointment->scheduled_date}}
                    (hora: {{$appointment->scheduled_time_12}} )
                </p>
            @else
                <p>
                    Estas a punto de cancelar la cita reservada 
                    con el médico:
                    {{$appointment->doctor->name}} 
                    por el paciente:
                    {{$appointment->patient->name}}
                    para el día 
                    {{$appointment->scheduled_date}}
                    (hora: {{$appointment->scheduled_time_12}} )
                </p>
            @endif
            <div class="form-group">
                <label for="Justification">  
                    Cuéntanos el motivo:
                </label>
                <textarea name="justification" id="justification" rows="3" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-md btn-danger">Cancelar Cita</button>
            <a href="{{url('/appointments')}}" class="btn btn-primary"> Volver al listado de citas</a>
        </form>
    </div>
</div>
@endsection