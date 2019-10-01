<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestionar Datos</h6>
<ul class="navbar-nav">
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