@php 
    $current_route = request()->route()->getName(); 

    $dashActive = in_array($current_route, ['dash']) ? 'active' : '';

    $studActive = in_array($current_route, ['studentcwtsShow']) ? 'active' : '';
    $studLTSActive = in_array($current_route, ['studentLTSShow']) ? 'active' : '';
    $studROTCActive = in_array($current_route, ['studentrotcShow']) ? 'active' : '';

    $fillupActive = in_array($current_route, ['fillupstudentCategoryRead', 'fillupstudentRead']) ? 'active' : '';
@endphp

<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        @auth('admin')
            @if(Auth::guard('admin')->user()->role == 'Administrator')
                <li class="nav-item">
                    <a href="{{ route('dash') }}" class="nav-link {{ $dashActive }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
        
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Students
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('studentcwtsShow') }}" class="nav-link {{ $studActive }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CWTS</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('studentLTSShow') }}" class="nav-link {{ $studLTSActive }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>LTS</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('studentrotcShow') }}" class="nav-link {{ $studROTCActive }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ROTC</p>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        @endauth

        @auth('web')
            @if(Auth::guard('web')->user()->role == 'Student')
                <li class="nav-item">
                    <a href="{{ route('fillupstudentCategoryRead') }}" class="nav-link {{ $fillupActive }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Fill Up
                        </p>
                    </a>
                </li>
            @endif
        @endauth
    </ul>
</nav>