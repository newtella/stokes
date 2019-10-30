<div class="table-responsive">
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Descripcion</th>
                @if($role == 'patient')
                    <th scope="col">Medico</th>
                @elseif($role == 'doctor')
                    <th scope="col">Paciente</th>
                @endif
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Tipo</th>
                <th scope="col">opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendingAppointments as $appointment)
            <tr>
            <th scope="row">
                {{ $appointment->description }}
            </th>
            @if($role == 'patient')
                <td>
                    {{ $appointment->doctor->name }}
                </td>
            @elseif($role == 'doctor')
                <td>
                    {{ $appointment->patient->name }}
                </td>
            @endif
            <td>
                {{ $appointment->scheduled_date }}
            </td>
            <td>
                {{ $appointment->scheduled_time_12 }}
            </td>
            <td>
                {{ $appointment->type }}
            </td>
            <td>
                @if($role == 'admin')
                    <a title="Ver Cita" 
                        href="{{ url('appointments/'.$appointment->id)}}" 
                        class="btn btn-sm btn-default">Ver
                    </a>
                @endif
                @if($role == 'doctor' || $role == 'admin')
                    <form action="{{ url('appointments/'.$appointment->id.'/confirm')}}" method="POST" class="d-inline-block">
                        @csrf
                        <button data-toggle="tooltip" type="submit" title="Confirmar cita" class="btn btn-sm btn-success">
                            <i class="ni ni-check-bold"></i>
                        </button>
                    </form>
                    <a href="{{ url('appointments/'.$appointment->id.'/cancel')}}"
                        class="btn btn-sm btn-danger">
                        <i class="ni ni-fat-delete"></i>
                    </a>
                @else
                    <form action="{{ url('appointments/'.$appointment->id.'/cancel')}}" method="POST" class="d-inline-block">
                        @csrf
                        <button data-toggle="tooltip" type="submit" title="Cancelar cita" class="btn btn-sm btn-danger">
                            <i class="ni ni-fat-delete"></i>
                        </button>
                    </form>
                @endif
            </td>
            @endforeach
            </tr>
        </tbody>
    </table>
    <div class="card-body">
        {{$pendingAppointments->links()}}
    </div>
</div>