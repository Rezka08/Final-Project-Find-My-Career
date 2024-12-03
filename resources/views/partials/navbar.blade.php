<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <!-- Brand -->
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ asset('img/Logo-Nav.png') }}" alt="Logo" style="height: 35px;">
        </a>        
        
        <!-- Toggler -->
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span></span>
            <span></span>
            <span></span>
        </button>
        
        <!-- Navigation -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Navigation Links with Icons -->
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="fas fa-home me-2"></i>Home
                    </a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('jobs*') ? 'active' : '' }}" href="{{ route('jobs') }}">
                            <i class="fas fa-briefcase me-2"></i>Jobs
                        </a>
                    </li>
                @endauth
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('about*') ? 'active' : '' }}" href="{{ route('about') }}">
                        <i class="fas fa-info-circle me-2"></i>About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('contact*') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <i class="fas fa-envelope me-2"></i>Contact
                    </a>
                </li>
            </ul>

            <!-- Auth Buttons -->
            <div class="nav-btn-group">
                @auth
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="settingsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-circle me-2"></i>Account
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingsDropdown">
                            @if(Auth::user()->role == 'Pelamar')
                                <li><a class="dropdown-item" href="{{ route('pelamar') }}">
                                    <i class="fas fa-user-circle me-2"></i>Your Profile</a>
                                </li>
                            @elseif(Auth::user()->role == 'Penyedia')
                                <li><a class="dropdown-item" href="{{ route('penyedia') }}">
                                    <i class="fas fa-th-large me-2"></i>Dashboard</a>
                                </li>
                            @elseif(Auth::user()->role == 'Admin')
                                <li><a class="dropdown-item" href="{{ route('admin') }}">
                                    <i class="fas fa-cog me-2"></i>Dashboard</a>
                                </li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('keluar') }}" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="btn btn-login">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </a>
                        <a href="{{ route('regist') }}" class="btn btn-register">
                            <i class="fas fa-user-plus me-2"></i>Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<style>
    /* Navbar Styles */
    .navbar {
    background-color: #ffffff;
    height: 70px;
    border-bottom: 1px solid #eaeaea;
    z-index: 1030;
}

/* Brand */
.navbar-brand {
    font-size: 1.5rem;
    font-weight: 600;
    color: #2d3436;
    padding: 0;
}

.brand-text {
    background: linear-gradient(45deg, #F29F58, #e67e22);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

/* Navigation Links */
.navbar-nav {
    gap: 1rem;
}

.nav-link {
    color: #2d3436 !important;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.5rem 0 !important;
    margin: 0 0.5rem;
    position: relative;
    transition: color 0.3s ease;
    display: flex;
    align-items: center;
}

.nav-link i {
    font-size: 1rem;
    transition: transform 0.3s ease;
}

.nav-link:hover i {
    transform: translateY(-1px);
}

.nav-link:hover,
.nav-link.active {
    color: #F29F58 !important;
}

.nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: 0;
    left: 50%;
    background-color: #F29F58;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.nav-link:hover::after,
.nav-link.active::after {
    width: 100%;
}

/* Auth Buttons */
.auth-buttons {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.btn {
    padding: 0.5rem 1.25rem;
    border-radius: 6px;
    font-weight: 500;
    transition: all 0.3s ease;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.5rem;
}

.btn-login {
    color: #F29F58;
    background: transparent;
    border: 1.5px solid #F29F58;
}

.btn-login:hover {
    background: #F29F58;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(242, 159, 88, 0.2);
}

.btn-login i {
    transition: transform 0.3s ease;
}

.btn-login:hover i {
    transform: translateX(-3px);
}

.btn-register {
    background: #F29F58;
    color: white;
    border: 1.5px solid #F29F58;
}

.btn-register:hover {
    background: #e67e22;
    border-color: #e67e22;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(230, 126, 34, 0.3);
}

.btn-register i {
    transition: transform 0.3s ease;
}

.btn-register:hover i {
    transform: scale(1.1);
}

/* Dropdown Styles */
.dropdown-menu {
    border: none;
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    border-radius: 8px;
    margin-top: 0.5rem;
}

.dropdown-toggle {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    color: #2d3436;
}

.dropdown-toggle:hover {
    background: #e9ecef;
    color: #F29F58;
}

.dropdown-item {
    font-size: 0.95rem;
    padding: 0.75rem 1.25rem;
    color: #2d3436;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
    color: #F29F58;
    transform: translateX(5px);
}

.dropdown-item.text-danger:hover {
    color: #dc3545 !important;
}

/* Hamburger Menu */
.navbar-toggler {
    border: none;
    padding: 0;
    width: 30px;
    height: 20px;
    position: relative;
}

.navbar-toggler:focus {
    box-shadow: none;
}

.navbar-toggler span {
    display: block;
    width: 100%;
    height: 2px;
    background: #2d3436;
    position: absolute;
    left: 0;
    transition: all 0.3s ease;
}

.navbar-toggler span:first-child {
    top: 0;
}

.navbar-toggler span:nth-child(2) {
    top: 50%;
    transform: translateY(-50%);
}

.navbar-toggler span:last-child {
    bottom: 0;
}

.navbar-toggler.collapsed span:first-child {
    transform: rotate(45deg);
    top: 50%;
}

.navbar-toggler.collapsed span:nth-child(2) {
    opacity: 0;
}

.navbar-toggler.collapsed span:last-child {
    transform: rotate(-45deg);
    bottom: 50%;
}

/* Mobile Adjustments */
@media (max-width: 991.98px) {
    .navbar-collapse {
        background: white;
        padding: 1rem;
        border-radius: 8px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        margin-top: 1rem;
    }

    .navbar-nav {
        gap: 0;
    }

    .nav-link {
        padding: 0.75rem 1rem !important;
        margin: 0;
        justify-content: flex-start;
    }

    .auth-buttons {
        margin-top: 1rem;
        flex-direction: column;
        width: 100%;
    }

    .auth-buttons .btn {
        width: 100%;
        justify-content: center;
    }
}

/* Additional Styles */
:root {
    --primary-color: #F29F58;
    --primary-dark: #e67e22;
}

/* Body Spacing */
body {
    padding-top: 70px;
}
</style>

<!-- Make sure to include Font Awesome in your layout -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Required Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>