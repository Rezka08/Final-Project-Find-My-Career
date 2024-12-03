<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link d-flex align-items-center">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-semibold">Find My Career</span>
    </a>

    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
                
                <!-- Profile Management -->
                <li class="nav-item">
                    <a href="/penyedia" class="nav-link {{ Request::is('penyedia') ? 'active bg-primary' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Profile Management</p>
                    </a>
                </li>

                <!-- Job Post Management -->
                <li class="nav-item {{ Request::is('penyedia/jobpost*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('penyedia/jobpost*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Job Post Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/penyedia/jobpost" 
                               class="nav-link {{ Request::is('penyedia/jobpost') && !Request::is('penyedia/jobpost/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Manage Jobs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/penyedia/jobpost/create" 
                               class="nav-link {{ Request::is('penyedia/jobpost/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Add New Job</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Logout -->
                <li class="nav-item mt-4">
                    <form action="{{ route('keluar') }}" method="post" 
                          onsubmit="return confirm('Are you sure you want to logout?')" 
                          class="px-2">
                        @csrf
                        <button type="submit" 
                                class="btn btn-danger btn-block d-flex align-items-center justify-content-center">
                            <i class="fas fa-sign-out-alt mr-2"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>