@extends('pelamar.layouts.main', ['title' => 'ShowProfile'])

@section('content')
    <!-- Content Header -->
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-user-circle mr-2"></i>
                        {{ Auth()->user()->name }}'s Dashboard
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent">
                            <li class="breadcrumb-item"><a href="/pelamar">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <ul class="nav nav-pills card-header-pills" id="profileTabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#profile-overview">
                                        <i class="fas fa-user mr-1"></i> Overview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile-apply">
                                        <i class="fas fa-briefcase mr-1"></i> Apply
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#profile-edit">
                                        <i class="fas fa-file-alt mr-1"></i> CV/Sertifikat
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <div class="tab-content">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade show active" id="profile-overview">
                                    @if (!$profile)
                                        <div class="text-center py-5">
                                            <i class="fas fa-user-plus fa-3x text-muted mb-3"></i>
                                            <h5>Profile Incompleted</h5>
                                            <a href="/pelamar/profile/create" class="btn btn-primary mt-3">
                                                <i class="fas fa-plus-circle mr-1"></i> Completed Profile
                                            </a>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <h5 class="card-title mb-0">
                                                            <i class="fas fa-id-card mr-2"></i>My Data
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th width="30%">Name</th>
                                                                <td>: {{ $profile->nama }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Age</th>
                                                                <td>: {{ $profile->umur }} Year</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Gender</th>
                                                                <td>: {{ $profile->jenis_kelamin }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="card shadow-sm">
                                                    <div class="card-header bg-light">
                                                        <h5 class="card-title mb-0">
                                                            <i class="fas fa-address-book mr-2"></i>Contact
                                                        </h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <table class="table table-borderless">
                                                            <tr>
                                                                <th width="30%">Email</th>
                                                                <td>: {{ $profile->email }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Phone Number</th>
                                                                <td>: {{ $profile->no_hp }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card shadow-sm mt-4">
                                            <div class="card-header bg-light">
                                                <h5 class="card-title mb-0">
                                                    <i class="fas fa-user-edit mr-2"></i>Description
                                                </h5>
                                            </div>
                                            <div class="card-body">
                                                <p class="text-justify">{{ $profile->deskripsi }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                <!-- Apply History Tab -->
                                <div class="tab-pane fade" id="profile-apply">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-hover">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th width="5%">No.</th>
                                                    <th>Perusahaan</th>
                                                    <th>Posisi</th>
                                                    <th width="15%">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($applyData as $data)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $data['perusahaan'] }}</td>
                                                        <td>{{ $data['posisi'] }}</td>
                                                        <td>
                                                            <span class="badge badge-{{ $data['status'] == 'Pending' ? 'warning' : ($data['status'] == 'Accepted' ? 'success' : 'danger') }}">
                                                                {{ $data['status'] }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Documents Tab -->
                                <div class="tab-pane fade" id="profile-edit">
                                    <div class="row">
                                        @forelse ($skill as $item)
                                        <div class="col-md-6">
                                            <div class="card shadow-sm mb-3">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <i class="fas fa-file-pdf fa-2x text-danger mr-3"></i>
                                                        <div>
                                                            <h6 class="mb-1">{{ $item->skill }}</h6>
                                                            @if(Storage::disk('public')->exists('photo-user-' . $profile->id . '/' . $item->skill))
                                                                <a href="{{ Storage::url('photo-user-' . $profile->id . '/' . $item->skill) }}" 
                                                                   target="_blank" 
                                                                   class="btn btn-sm btn-outline-primary">
                                                                    <i class="fas fa-eye mr-1"></i>View Document
                                                                </a>
                                                            @else
                                                                <span class="text-danger">File not found</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty
                                            <div class="col-12 text-center py-5">
                                                <i class="fas fa-file-upload fa-3x text-muted mb-3"></i>
                                                <h5>Belum ada dokumen yang diupload</h5>
                                                <a href="/pelamar/skill/create" class="btn btn-primary mt-3">
                                                    <i class="fas fa-plus-circle mr-1"></i> Upload Document
                                                </a>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection