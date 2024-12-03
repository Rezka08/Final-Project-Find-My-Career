@extends('pelamar.layouts.main', ['title' => 'Manage Profile'])

@section('content')
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Profile Management</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/pelamar">Dashboard</a></li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Alert Messages -->
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle mr-2"></i>
                    {{ session('message') }}
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Profile Card -->
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-user mr-2"></i>
                    Profile Information
                </h3>
                
                <div class="card-tools">
                    @if(!$profile)
                        <a href="/pelamar/profile/create" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-1"></i>
                            Add Profile
                        </a>
                    @endif
                </div>
            </div>
            
            <div class="card-body">
                @if($profile)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 50px">No.</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th style="width: 150px">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="profile-icon mr-3">
                                                {{ strtoupper(substr($profile->nama, 0, 1)) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $profile->nama }}</h6>
                                                <small class="text-muted">Profile ID: #{{ $profile->id }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <i class="fas fa-envelope text-muted mr-1"></i>
                                        {{ $profile->email }}
                                    </td>
                                    <td>
                                        <i class="fas fa-phone text-muted mr-1"></i>
                                        {{ $profile->no_hp }}
                                    </td>
                                    <td>
                                        <form action="/pelamar/profile/{{ $profile->id }}" method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" 
                                                    class="btn btn-danger btn-sm" 
                                                    onclick="return confirm('Are you sure you want to delete this profile?')">
                                                <i class="fas fa-trash"></i>
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <img src="{{ asset('img/profile-empty.svg') }}" alt="No Profile" style="width: 200px; opacity: 0.5">
                        <h4 class="mt-4">No Profile Information</h4>
                        <p class="text-muted">Click the button above to add your profile information.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<style>
/* Profile Icon */
.profile-icon {
    width: 40px;
    height: 40px;
    background: #e9ecef;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    color: #3498db;
}

/* Table Styles */
.table th {
    background: #f8f9fa;
    font-weight: 600;
}

.table td {
    vertical-align: middle;
}

/* Card Styles */
.card-outline {
    border-top: 3px solid #3498db;
}

/* Alert Styles */
.alert {
    border: none;
    border-radius: 0.5rem;
}

.alert-success {
    background-color: #d1fae5;
    color: #065f46;
}

/* Button Styles */
.btn {
    border-radius: 0.25rem;
    padding: 0.375rem 0.75rem;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
}

.btn i {
    font-size: 0.875rem;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .profile-icon {
        width: 32px;
        height: 32px;
        font-size: 0.875rem;
    }
    
    .table td {
        white-space: nowrap;
    }
}
</style>
@endsection