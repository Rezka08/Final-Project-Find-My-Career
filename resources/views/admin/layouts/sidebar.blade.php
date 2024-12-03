<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link d-flex align-items-center">
        <img src="{{ asset('img/logo.jpg') }}" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-semibold">Find My Career</span>
    </a>

    <div class="sidebar">
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="/admin" class="nav-link {{ Request::is('admin') ? 'active bg-primary' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- User Management -->
                <li class="nav-item {{ Request::is('admin/user*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/user*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            User Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/user" 
                               class="nav-link {{ Request::is('admin/user') || Request::is('admin/user/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/user/create" 
                               class="nav-link {{ Request::is('admin/user/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Profile Management -->
                <li class="nav-item {{ Request::is('admin/profile*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Profile Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/profile" 
                               class="nav-link {{ Request::is('admin/profile') || Request::is('admin/profile/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Manage Profiles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/profile/create" 
                               class="nav-link {{ Request::is('admin/profile/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Add Profile</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Job Post Management -->
                <li class="nav-item {{ Request::is('admin/jobpost*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/jobpost*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Job Post Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/jobpost" 
                               class="nav-link {{ Request::is('admin/jobpost') || Request::is('admin/jobpost/*/edit') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Manage Jobs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/jobpost/create" 
                               class="nav-link {{ Request::is('admin/jobpost/create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-success"></i>
                                <p>Add Job</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Applicant Management -->
                <li class="nav-item {{ Request::is('admin/apply') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/apply') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Applicant Management
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/apply" class="nav-link {{ Request::is('admin/apply') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon text-info"></i>
                                <p>Manage Applications</p>
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