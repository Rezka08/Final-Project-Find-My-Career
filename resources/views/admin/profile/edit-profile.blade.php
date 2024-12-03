@extends('admin.layouts.main', ['title' => 'EditProfile'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <a href="/admin/profile" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <h1 class="m-0 text-primary">
                            <i class="fas fa-user-edit mr-2"></i>Edit Profile
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/profile">Profiles</a></li>
                            <li class="breadcrumb-item active">Edit</li>
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
                                <i class="fas fa-user-circle mr-2"></i>Profile Information
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <form action="/admin/profile/{{ $data->id }}" method="post">
                                @csrf
                                @method('put')
                                
                                <div class="row">
                                    <!-- Basic Information -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                name="nama" value="{{ old('nama', $data->nama) }}" required>
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
                                                <option value="laki-laki" {{ $data->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Male</option>
                                                <option value="perempuan" {{ $data->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Female</option>
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
                                                name="no_hp" value="{{ old('no_hp', $data->no_hp) }}" required>
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
                                                name="umur" value="{{ old('umur', $data->umur) }}" required>
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
                                                name="inputEmail3" value="{{ old('inputEmail3', $data->email) }}" required>
                                            @error('inputEmail3')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label class="form-label">Description</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            </div>
                                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                                name="deskripsi" rows="4" required>{{ old('deskripsi', $data->deskripsi) }}</textarea>
                                            @error('deskripsi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right mt-4">
                                    <a href="/admin/profile" class="btn btn-secondary mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Update Profile
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