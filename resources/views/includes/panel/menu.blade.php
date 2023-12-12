<!-- Heading -->
<h6 class="navbar-heading text-muted">
@if(auth()->user()->role == 'admin')  
  Gestión
@else
  Menú
@endif
</h6>
<ul class="navbar-nav">
     
        @if(auth()->user()->role == 'admin')
          <li class="nav-item  active ">
            <a class="nav-link  active " href="/home">
              <i class="ni ni-tv-2 text-danger"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/conductores')}}">
              <i class="ni ni-briefcase-24 text-blue"></i> Conductores
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="/producciones">
              <i class="ni ni-pin-3 text-orange"></i> Producciones
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/productoras')}}">
              <i class="ni ni-single-02 text-yellow"></i> Productoras
            </a>
          </li>
          @elseif(auth()->user()->role == 'conductor')
          <li class="nav-item">
            <a class="nav-link " href="/horario">
              <i class="ni ni-calendar-grid-58 text-primary"></i> Gestionar Horario
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="fas fa-clock text-info"></i> Mis citas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="ni ni-pin-3 text-danger"></i>Mis Producciones
            </a>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="ni ni-calendar-grid-58 text-primary"></i> Reservar Cita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="">
              <i class="fas fa-clock text-info"></i> Mis citas
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('formLogout').submit();" >
              <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
            </a>
            <form action="{{route('logout')}}" method="POST" style="display: none;" id="formLogout">
                @csrf
            </form>
          </li>
        </ul>
        @if(auth()->user()->role == 'admin')
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <h6 class="navbar-heading text-muted">Reportes</h6>
        <!-- Navigation -->
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-books text-default"></i> Recogidas
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="ni ni-chart-bar-32 text-warning"></i> Desempeño Conductores
            </a>
          </li>
          
        </ul>
        @endif