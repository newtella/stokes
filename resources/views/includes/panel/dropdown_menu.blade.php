<div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
    <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Bienvenido!</h6>
    </div>
    <!-- <a href="./examples/profile.html" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>Mi Perfil</span>
    </a>
    <a href="./examples/profile.html" class="dropdown-item">
        <i class="ni ni-settings-gear-65"></i>
        <span>Configuracion</span>
    </a>
    <a href="./examples/profile.html" class="dropdown-item">
        <i class="ni ni-calendar-grid-58"></i>
        <span>Mis Citas</span>
    </a>
    <a href="./examples/profile.html" class="dropdown-item">
        <i class="ni ni-support-16"></i>
        <span>Ayuda</span>
    </a> -->
    <div class="dropdown-divider"></div>
    <a href="{{route('logout')}}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout3').submit();" >
        <i class="ni ni-user-run"></i>
        <span>Cerrar Sesion</span>
    </a>
    <form id="logout3" action="{{route('logout')}}" method="POST" stlye="display: none;">
        @csrf
    </form>
</div>