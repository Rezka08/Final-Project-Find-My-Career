@extends('Auth.layouts.app', ['title' => 'Login'])

@section('content')
<div class="login-container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-5">
            <!-- Brand Header -->
            <div class="text-center mb-4">
                <img src="{{ asset('img/Logo-Nav.png') }}" alt="Find My Career Logo" class="brand-logo">
                <p class="text-muted">Welcome back! Please login to your account.</p>
            </div>
            

            <!-- Login Card -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <!-- Alert Messages -->
                    @if($message = Session::get('failed'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle me-2"></i>
                                {{ $message }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ $message }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Login Form -->
                    <form action="{{ route('autentikasi') }}" method="post">
                        @csrf
                        
                        <!-- Email Field -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="email">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('email') is-invalid @enderror"
                                       id="email" 
                                       name="email"
                                       placeholder="Enter your email"
                                       required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Password Field -->
                        <div class="form-group mb-4">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('password') is-invalid @enderror"
                                       id="password" 
                                       name="password"
                                       placeholder="Enter your password"
                                       required>
                                <button class="btn btn-outline-secondary" 
                                        type="button"
                                        id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>

                        <!-- Links -->
                        <div class="text-center">
                            <p class="mb-2">
                                <a href="{{ route('forget-password') }}" class="text-decoration-none">
                                    <i class="fas fa-key me-1"></i>Forgot your password?
                                </a>
                            </p>
                            <p class="mb-0">
                                Don't have an account? 
                                <a href="{{ route('regist') }}" class="text-decoration-none">Register here</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-4">
                <p class="text-muted small mb-0">
                    &copy; 2024 Find My Career. All rights reserved.
                </p>
            </div>
        </div>
    </div>
</div>

<style>
/* Container */
.login-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #f6f8fb 0%, #f1f4f8 100%);
}

/* Brand Text */
.brand-text {
    background: linear-gradient(45deg, #F29F58, #e67e22);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    font-weight: 700;
    font-size: 2.5rem;
    margin-bottom: 0.5rem;
}

/* Card */
.card {
    border-radius: 20px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
}

/* Form Controls */
.form-label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.75rem;
    font-size: 0.95rem;
}

.input-group-text {
    border: 1px solid #e9ecef;
    border-right: none;
    color: #6c757d;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
}

.form-control {
    border: 1px solid #e9ecef;
    font-size: 1rem;
    padding: 0.75rem 1.25rem;
}

.form-control:focus {
    border-color: #F29F58;
    box-shadow: 0 0 0 0.25rem rgba(242, 159, 88, 0.1);
}

/* Input Groups */
.input-group {
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    border-radius: 12px;
    overflow: hidden;
}

.input-group .form-control,
.input-group .input-group-text,
.input-group .btn {
    border-radius: 0;
}

/* Button */
.btn-primary {
    background: linear-gradient(135deg, #F29F58, #e67e22);
    border: none;
    font-weight: 600;
    padding: 1rem;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(242, 159, 88, 0.3);
}

/* Alert */
.alert {
    border: none;
    border-radius: 12px;
    padding: 1rem;
}

.alert-success {
    background-color: #d1fae5;
    color: #065f46;
}

.alert-danger {
    background-color: #fee2e2;
    color: #991b1b;
}

/* Links */
a {
    color: #F29F58;
    transition: color 0.3s ease;
}

a:hover {
    color: #e67e22;
}

/* Responsive */
@media (max-width: 768px) {
    .card-body {
        padding: 2rem !important;
    }

    .brand-text {
        font-size: 2rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Password Toggle
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        this.querySelector('i').classList.toggle('fa-eye');
        this.querySelector('i').classList.toggle('fa-eye-slash');
    });

    // Form Validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        if (!form.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        form.classList.add('was-validated');
    });
});
</script>
@endsection