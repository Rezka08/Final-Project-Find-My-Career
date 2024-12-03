@extends('pelamar.layouts.main', ['title' => 'CreateProfile'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <a href="/pelamar" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <h1 class="m-0 text-primary">
                            <i class="fas fa-user-plus mr-2"></i>Create Profile
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/pelamar">Dashboard</a></li>
                            <li class="breadcrumb-item active">Create Profile</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content mt-4">
        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle mr-2"></i>{{ session('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-edit mr-2"></i>Personal Information
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <form action="/pelamar/profile" method="post">
                                @csrf
                                <div class="row">
                                    <!-- Basic Information -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ old('nama') }}" 
                                                placeholder="Enter your full name" required>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                                            </div>
                                            <select name="jenis_kelamin" class="form-control">
                                                <option value="laki-laki">Male</option>
                                                <option value="perempuan">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                                name="no_hp" value="{{ old('no_hp') }}" 
                                                placeholder="Enter phone number" required>
                                            @error('no_hp')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Age</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-birthday-cake"></i></span>
                                            </div>
                                            <input type="number" class="form-control @error('umur') is-invalid @enderror"
                                                name="umur" value="{{ old('umur') }}" 
                                                placeholder="Enter your age" required>
                                            @error('umur')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Email Address</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control @error('inputEmail3') is-invalid @enderror"
                                                name="inputEmail3" value="{{ old('inputEmail3') }}" 
                                                placeholder="Enter email address" required>
                                            @error('inputEmail3')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">About Me</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-edit"></i></span>
                                            </div>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                                name="deskripsi" rows="4" 
                                                placeholder="Tell us about yourself..." required>{{ old('deskripsi') }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right mt-4">
                                    <a href="/pelamar" class="btn btn-secondary mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Create Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection