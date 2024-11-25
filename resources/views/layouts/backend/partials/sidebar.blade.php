<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            {{-- @foreach(Auth::user()->role->permissions as $permission) --}}

            <a class="{{ Request::is('app/dashboard') ? 'nav-link active' : 'nav-link'}}" href="{{ route('app.dashboard') }}">
                <div class="sb-nav-link-icon"></div>
                Dashboard
            </a>

            <a class="{{ Request::is('app/messege') ? 'nav-link active' : 'nav-link'}}" href="{{ route('app.messege') }}">
                <div class="sb-nav-link-icon"></div>
                Guest
            </a>

            {{-- <a class="{{ Request::is('app/users*') ? 'nav-link active' : 'nav-link'}}" href="{{ route('app.users.index') }}">
                <div class="sb-nav-link-icon"></div>
                 User
            </a> --}}


            @foreach(Auth::user()->role->permissions as $permission)
            <a class="{{ Request::is('app/users*') ? 'nav-link active' : 'nav-link'}}" href="{{ route('app.users.index') }}"
            style="{{ $permission->name != "Access User" ? 'display:none' : '' }}">
                <div class="sb-nav-link-icon"></div>
                 User                 
            </a>
            @endforeach


            <a class="{{ Request::is('app/messeges*') ? 'nav-link active' : 'nav-link'}}" href="{{ route('app.messeges.index') }}" style="">
                <div class="sb-nav-link-icon"></div>
                <span style="width: 90px;">Messeges </span>
                @if(Auth::user()->unreadNotifications->count())
                <span class="badge badge-light bg-danger">{{ Auth::user()->unreadNotifications->count() }}</span>
                @endif
            </a>

            @foreach(Auth::user()->role->permissions as $permission)
            <a class="{{ Request::is('app/roles*') ? 'nav-link active' : 'nav-link'}}" href="{{ route('app.roles.index') }}"
            style="{{ $permission->name != "Access Role" ? 'display:none' : '' }}">
                <div class="sb-nav-link-icon"></div>
                Role
            </a>
            @endforeach
             
            <a class="nav-link" href="{{ route('app.permissions.index') }}"
            style="{{ Auth::user()->role->slug !="admin" ? 'display:none' : '' }}">
                <div class="sb-nav-link-icon"></div>
                Permission
            </a>  
            {{-- @endforeach  --}}
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->role->slug}}
    </div>
</nav>
