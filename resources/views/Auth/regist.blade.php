@extends('Auth.layouts.app', ['title' => 'Register'])

@section('content')
<div class="register-container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-md-6 col-lg-5">
            <!-- Brand Header -->
            <div class="text-center mb-4">
                <img src="{{ asset('img/Logo-Nav.png') }}" alt="Find My Career Logo" class="brand-logo">
                <p class="text-muted">Create Your Account.</p>
            </div>
            

            <!-- Register Card -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <!-- Alert Messages -->
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ $message }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Register Form -->
                    <form action="{{ route('regist.store') }}" method="post">
                        @csrf
                        
                        <!-- Username & Role -->
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="username">Username</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user"></i>
                                        </span>
                                        <input type="text" 
                                               class="form-control @error('username') is-invalid @enderror"
                                               id="username"
                                               name="username"
                                               placeholder="Enter username"
                                               value="{{ old('username') }}"
                                               required>
                                    </div>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label" for="role">User Type</label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-user-tag"></i>
                                        </span>
                                        <select id="role" 
                                                name="role" 
                                                class="form-select">
                                            <option value="Pelamar">Job Seeker</option>
                                            <option value="Penyedia">Employer</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label class="form-label" for="inputEmail3">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" 
                                       class="form-control @error('inputEmail3') is-invalid @enderror"
                                       id="inputEmail3"
                                       name="inputEmail3"
                                       placeholder="Enter email"
                                       value="{{ old('inputEmail3') }}"
                                       required>
                            </div>
                            @error('inputEmail3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-4">
                            <label class="form-label" for="inputPassword3">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" 
                                       class="form-control @error('inputPassword3') is-invalid @enderror"
                                       id="inputPassword3"
                                       name="inputPassword3"
                                       placeholder="Create password"
                                       required>
                                <button class="btn btn-outline-secondary" 
                                        type="button"
                                        id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            @error('inputPassword3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 mb-3">
                            <i class="fas fa-user-plus me-2"></i>Create Account
                        </button>

                        <!-- Login Link -->
                        <div class="text-center">
                            <p class="mb-0">
                                Already have an account? 
                                <a href="{{ route('login') }}" class="text-decoration-none">Login here</a>
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
.register-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #f6f8fb 0%, #f1f4f8 100%);
}

.brand-logo {
    max-width: 700px; /* Sesuaikan ukuran logo */
    height: auto;
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

.form-control,
.form-select {
    border: 1px solid #e9ecef;
    font-size: 1rem;
    padding: 0.75rem 1.25rem;
}

.form-control:focus,
.form-select:focus {
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
.input-group .form-select,
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
    const password = document.querySelector('#inputPassword3');

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