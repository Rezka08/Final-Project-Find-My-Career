@extends('admin.layouts.main', ['title' => 'ShowProfile'])

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
                            <i class="fas fa-user mr-2"></i>Profile Details
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/profile">Profiles</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <!-- Main Profile Information -->
                <div class="col-lg-8">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-user-circle mr-2"></i>Personal Information
                            </h3>
                        </div>
                        <div class="card-body">
                            <!-- Personal Data -->
                            <div class="mb-4">
                                <h5 class="text-primary border-bottom pb-2">Personal Data</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="120"><i class="fas fa-user mr-2"></i>Name</th>
                                            <td>: {{ $profile->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-birthday-cake mr-2"></i>Age</th>
                                            <td>: {{ $profile->umur }} years</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-venus-mars mr-2"></i>Gender</th>
                                            <td>: {{ ucfirst($profile->jenis_kelamin) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="mb-4">
                                <h5 class="text-primary border-bottom pb-2">Contact Information</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th width="120"><i class="fas fa-envelope mr-2"></i>Email</th>
                                            <td>: {{ $profile->email }}</td>
                                        </tr>
                                        <tr>
                                            <th><i class="fas fa-phone mr-2"></i>Phone</th>
                                            <td>: {{ $profile->no_hp }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                            <!-- Description -->
                            <div>
                                <h5 class="text-primary border-bottom pb-2">About</h5>
                                <p class="text-justify">{{ $profile->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Skills & Certificates -->
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-certificate mr-2"></i>CV/Sertifikat
                            </h3>
                        </div>
                        <div class="card-body">
                            @forelse ($skill as $item)
                                <div class="d-flex align-items-center mb-3">
                                    <i class="fas fa-file-pdf text-danger mr-2"></i>
                                    <a href="{{ asset('storage/photo-user-' . $profile->id . '/' . $item->skill) }}" 
                                       target="_blank" 
                                       class="text-primary">
                                        {{ $item->skill }}
                                    </a>
                                </div>
                            @empty
                                <p class="text-muted mb-0">
                                    <i class="fas fa-info-circle mr-1"></i>No certificates uploaded yet
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection