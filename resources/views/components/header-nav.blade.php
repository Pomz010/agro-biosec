<header class="header" id="adminPage">
    {{-- MAIN NAV --}}
    <nav class="header-nav">
        <ul>
            <span id="headerNavContainer">
                <li><a href="{{ route('employee.index') }}"><img src="{{ asset('img/apc_logo2.png') }}" alt="Navigation Logo" width="35" height="35"></a></li>
                <li class="{{ $navActive === 'employee-management' ? 'nav-active' : '' }} nav-links"><a href="{{ route('employee.index') }}">Employee Management</a></li>
                <li class="{{ $navActive === 'response-management' ? 'nav-active' : '' }} nav-links"><a href="{{ route('response.show') }}">Assessment Reports</a></li>
                @can('viewAdminUsers')
                    <li class="{{ $navActive === 'user-management' ? 'nav-active' : '' }} nav-links"><a href="{{ route('users.index') }}">User Management</a></li>
                @endcan
            </span>
            <span>
                <li >Hi, {{ $currentUser->firstname }}!</li>
                <li><a href="{{ route('logout') }}">Sign Out</a></li>
            </span>                
        </ul>
    </nav>
</header>