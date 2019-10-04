<!-- Navigation -->
@if(auth()->user()->role == 'admin')
<h6 class="navbar-heading text-muted">Gestionar Datos</h6>
@else
<h6 class="navbar-heading text-muted">Menu</h6>
@endif
<ul class="navbar-nav">
    @if(auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="ni ni-tv-2 text-orange"></i> Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/specialties') }}">
            <i class="ni ni-planet text-blue"></i> Especialidades
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/doctors') }}">
            <i class="ni ni-pin-3 text-green"></i> Medicos
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/patients') }}">
            <i class="ni ni-single-02 text-yellow"></i> Pacientes
        </a>
    </li>
    @elseif(auth()->user()->role == 'doctor')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/schedule') }}">
            <i class="ni ni-tv-2 text-orange"></i> Gestionar Horarios
        </a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ url('/specialties') }}">
                <i class="ni ni-calendar-grid-58 text-danger"></i> Mis Citas
            </a>
        </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/specialties') }}">
            <i class="ni ni-planet text-blue"></i> Mis Pacientes
        </a>
    </li>
    @else(auth()->user()->role == 'patient')
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/home') }}">
            <i class="ni ni-tv-2 text-orange"></i> Reservar citas
        </a>
    </li>
    <li class="nav-item">
            <a class="nav-link" href="{{ url('/specialties') }}">
                <i class="ni ni-calendar-grid-58 text-danger"></i> Mis Citas
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
            <i class="ni ni-key-25"></i> Cerrar Sesion
        </a>
        <form id="logout" action="{{route('logout')}}" method="POST" style="display: none;">
        @csrf
        </form>
    </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
@if(auth()->user()->role == 'admin')
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
            <i class="ni ni-collection text-blue"></i> Frecuencia de visitas
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
            <i class="ni ni-palette text-orange"></i> Medicos mas activos
        </a>
    </li>
</ul>
@endif