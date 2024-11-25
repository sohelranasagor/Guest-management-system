<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('app.dashboard') }}">Guest Management</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <a href="{{ route('app.messeges.index') }}" class="text-white" style="width: 60px;">
            <i class="fas fa-envelope fa-2x"></i>
            @if(Auth::user()->unreadNotifications->count())
            <span class="badge rounded-pill badge-notification bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
            @endif
        </a>
        <ul class="navbar-nav ">
            <div class="navbar-text ">
                <div class="widget-heading">
                    <strong>{{Auth::user()->name}}</strong>
                </div>
            </div>	
        </ul>		  
      </div>
    <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <button type="button" tabindex="0" class="dropdown-item" 
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="align-middle me-1" data-feather="log-out"></i> 
                        Log out</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>