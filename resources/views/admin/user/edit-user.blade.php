@extends('admin.layouts.main', ['title' => 'Edit User'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <a href="/admin/user" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <h1 class="m-0 text-primary">
                            <i class="fas fa-user-edit mr-2"></i>Edit User Data
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/user">User Management</a></li>
                            <li class="breadcrumb-item active">Edit User</li>
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
                                <i class="fas fa-user-circle mr-2"></i>User Form
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <form action="/admin/user/{{ $data->id }}" method="post">
                                @csrf
                                @method('put')
                                
                                <div class="row">
                                    <!-- Username -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                                name="username" value="{{ old('username', $data->name) }}" required>
                                            @error('username')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Role -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Role</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-tag"></i></span>
                                            </div>
                                            <select name="role" class="form-control">
                                                <option value="{{ $data->role }}" selected>{{ $data->role }}</option>
                                                @if (isset($role[0]))
                                                    <option value="{{ $role[0] }}">{{ $role[0] }}</option>
                                                @elseif ($data->role == 'Penyedia')
                                                    <option value="Pelamar">Pelamar</option>
                                                @else
                                                    <option value="Penyedia">Penyedia</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Email</label>
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

                                    <!-- New Password -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label">New Password</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                            </div>
                                            <input type="password" class="form-control @error('inputPassword3') is-invalid @enderror"
                                                name="inputPassword3" placeholder="Enter New Password">
                                            @error('inputPassword3')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right mt-4">
                                    <a href="/admin/user" class="btn btn-secondary mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Update User
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
