@extends('Penyedia.layouts.main', ['title' => 'Showjobpost'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <a href="/penyedia/jobpost" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <h1 class="m-0 text-primary">
                            <i class="fas fa-briefcase mr-2"></i>Job Details
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                            <li class="breadcrumb-item"><a href="/penyedia/jobpost">Jobs</a></li>
                            <li class="breadcrumb-item active">Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <!-- Main Job Information -->
                <div class="col-lg-8">
                    <div class="card card-primary card-outline h-100">
                        <div class="card-body">
                            <!-- Job Header -->
                            <div class="border-bottom pb-4 mb-4">
                                <h3 class="text-primary mb-2">{{ $jobpost->posisi }}</h3>
                                <h5 class="text-muted mb-4">{{ $perusahaan->namaCompany }}</h5>
                                
                                <div class="d-flex flex-wrap gap-4">
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light p-2 mr-2">
                                            <i class="fas fa-map-marker-alt text-primary"></i>
                                        </div>
                                        <span>{{ $jobpost->lokasi }}</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light p-2 mr-2">
                                            <i class="far fa-clock text-primary"></i>
                                        </div>
                                        <span>{{ $jobpost->type }}</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="rounded-circle bg-light p-2 mr-2">
                                            <i class="far fa-money-bill-alt text-primary"></i>
                                        </div>
                                        <span>{{ $formattedGaji }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Job Description -->
                            <div class="mb-5">
                                <h4 class="font-weight-bold mb-3">
                                    <i class="fas fa-tasks mr-2 text-primary"></i>Job Description
                                </h4>
                                <p class="text-justify">{{ $jobpost->deskripsi }}</p>
                            </div>

                            <!-- Company Details -->
                            <div>
                                <h4 class="font-weight-bold mb-3">
                                    <i class="fas fa-building mr-2 text-primary"></i>About Company
                                </h4>
                                <p class="text-justify">{{ $perusahaan->detail }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job Summary Sidebar -->
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h4 class="card-title mb-4">
                                <i class="fas fa-info-circle mr-2"></i>Job Summary
                            </h4>
                            
                            <ul class="list-unstyled">
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="rounded-circle bg-light p-2 mr-3">
                                        <i class="fas fa-calendar text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Published On</small>
                                        {{ $jobpost->created_at->format('d M Y') }}
                                    </div>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="rounded-circle bg-light p-2 mr-3">
                                        <i class="fas fa-users text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Vacancy</small>
                                        {{ $jumlahPosisi }} Position(s)
                                    </div>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="rounded-circle bg-light p-2 mr-3">
                                        <i class="fas fa-briefcase text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Job Type</small>
                                        {{ ucfirst($jobpost->type) }}
                                    </div>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="rounded-circle bg-light p-2 mr-3">
                                        <i class="fas fa-money-bill-wave text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Salary</small>
                                        {{ $formattedGaji }}
                                    </div>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="rounded-circle bg-light p-2 mr-3">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Location</small>
                                        {{ $jobpost->lokasi }}
                                    </div>
                                </li>
                                <li class="mb-3 d-flex align-items-center">
                                    <div class="rounded-circle bg-light p-2 mr-3">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted d-block">Contact Email</small>
                                        {{ $jobpost->email }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection