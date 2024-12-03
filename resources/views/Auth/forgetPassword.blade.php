@extends('Auth.layouts.app', ['title' => 'Forgot Password'])

@section('content')
<div class="auth-card">
    <!-- Brand Header -->
    <div class="text-center mb-4">
        <h2 class="brand-text">Find My Career</h2>
        <p class="text-muted">Enter your email to reset password</p>
    </div>

    <!-- Alert Messages -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-circle me-2"></i>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
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

    <!-- Reset Password Form -->
    <form action="{{ route('forgetPassword.request.post') }}" method="post">
        @csrf
        
        <!-- Email Field -->
        <div class="form-group mb-4">
            <label class="form-label" for="email">Email Address</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
                <input type="email" 
                       name="email" 
                       class="form-control" 
                       id="email" 
                       placeholder="Enter your email address"
                       required>
            </div>
            <small class="form-text text-muted mt-2">
                We'll send you a link to reset your password.
            </small>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary w-100 mb-4">
            <i class="fas fa-paper-plane me-2"></i>Send Reset Link
        </button>

        <!-- Back to Login -->
        <div class="text-center">
            <p class="mb-0">
                Remember your password? 
                <a href="{{ route('login') }}" class="text-decoration-none">
                    <i class="fas fa-sign-in-alt me-1"></i>Back to Login
                </a>
            </p>
        </div>
    </form>
</div>

<style>
.auth-card {
    background: white;
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    width: 100%;
    max-width: 440px;
    margin: 0 auto;
}

.brand-text {
    font-size: 2.25rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    background: linear-gradient(45deg, #F29F58, #e67e22);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.form-label {
    font-weight: 500;
    color: #2c3e50;
    margin-bottom: 0.75rem;
}

.input-group {
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
}

.input-group-text {
    background: #f8f9fa;
    border: 1px solid #e9ecef;
    color: #6c757d;
    padding: 0.75rem 1rem;
}

.form-control {
    border: 1px solid #e9ecef;
    padding: 0.75rem 1rem;
    font-size: 0.95rem;
}

.form-control:focus {
    border-color: #F29F58;
    box-shadow: 0 0 0 0.25rem rgba(242, 159, 88, 0.1);
}

.form-text {
    font-size: 0.875rem;
}

.btn-primary {
    background: linear-gradient(135deg, #F29F58, #e67e22);
    border: none;
    padding: 0.875rem;
    font-weight: 600;
    transition: all 0.3s ease;
    border-radius: 12px;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(242, 159, 88, 0.2);
}

.alert {
    border: none;
    padding: 1rem;
    border-radius: 12px;
}

.alert-success {
    background-color: #d1fae5;
    color: #065f46;
}

.alert-danger {
    background-color: #fee2e2;
    color: #991b1b;
}

a {
    color: #F29F58;
    transition: color 0.3s ease;
}

a:hover {
    color: #e67e22;
}

@media (max-width: 480px) {
    .auth-card {
        padding: 1.5rem;
    }

    .brand-text {
        font-size: 1.75rem;
    }
}
</style>
@endsection