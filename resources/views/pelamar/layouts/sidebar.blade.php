<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link d-flex align-items-center">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-semibold">Find My Career</span>
    </a>

    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
                
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/pelamar" class="nav-link {{ Request::is('pelamar') ? 'active bg-primary' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>User Dashboard</p>
                    </a>
                </li>

                <!-- Profile Management -->
                <li class="nav-item {{ Request::is('pelamar/profile*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('pelamar/profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profile Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pelamar/profile" 
                               class="nav-link {{ Request::is('pelamar/profile') && !Request::is('pelamar/profile/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Manage Data</p>
                            </a>
                        </li>
                        @if ($profile)
                            <li class="nav-item">
                                <a href="/pelamar/profile/{{$profile->id}}/edit" 
                                   class="nav-link {{ Request::is('pelamar/profile/*/edit') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon text-warning"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="/pelamar/profile/create" 
                                   class="nav-link {{ Request::is('pelamar/profile/create') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon text-success"></i>
                                    <p>Input Profile</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <!-- File Management -->
                <li class="nav-item {{ Request::is('pelamar/skill*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('pelamar/skill*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            File Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/pelamar/skill" 
                               class="nav-link {{ Request::is('pelamar/skill') || Request::is('pelamar/skill/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Manage Data</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pelamar/skill/create" 
                               class="nav-link {{ Request::is('pelamar/skill/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Input CV/Sertifikat</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-item mt-4">
                    <form action="{{ route('keluar') }}" method="post" onsubmit="return confirm('Are you sure want to LogOut?')" class="px-2">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-block d-flex align-items-center justify-content-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>