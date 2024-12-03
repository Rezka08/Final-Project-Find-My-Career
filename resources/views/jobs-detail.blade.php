@extends('layout.main', ['title' => '| JobsDetail'])

@section('content')
    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <div class="container py-5">
        <div class="row gy-4">
            <!-- Left Column - Job Details -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <a href="{{ route('jobs') }}" class="btn btn-outline-primary mb-4">
                            <i class="fa fa-arrow-left me-2"></i>Back to Jobs
                        </a>

                        <!-- Job Header -->
                        <div class="mb-4">
                            <h2 class="text-primary mb-2">{{ $jobpost->posisi }}</h2>
                            <h5 class="text-muted mb-4">{{ $perusahaan->namaCompany }}</h5>
                            
                            <div class="d-flex flex-wrap gap-4">
                                <div class="d-flex align-items-center text-muted">
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                    <span>{{ $jobpost->lokasi }}</span>
                                </div>
                                <div class="d-flex align-items-center text-muted">
                                    <i class="far fa-clock text-primary me-2"></i>
                                    <span>{{ $jobpost->type }}</span>
                                </div>
                                <div class="d-flex align-items-center text-muted">
                                    <i class="far fa-money-bill-alt text-primary me-2"></i>
                                    <span>{{ $formattedGaji }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Job Description -->
                        <div class="mb-5">
                            <h4 class="border-bottom pb-2 mb-3">Job Description</h4>
                            <p class="text-justify">{{ $jobpost->deskripsi }}</p>
                        </div>

                        <!-- Company Details -->
                        <div>
                            <h4 class="border-bottom pb-2 mb-3">About Company</h4>
                            <p class="text-justify">{{ $perusahaan->detail }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Job Summary -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Job Summary</h4>
                        
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="fa fa-calendar text-primary me-2"></i>
                                <span class="text-muted">Published:</span> {{ $jobpost->created_at->format('d M Y') }}
                            </li>
                            <li class="mb-3">
                                <i class="fa fa-users text-primary me-2"></i>
                                <span class="text-muted">Vacancy:</span> {{ $jumlahPosisi }} Position(s)
                            </li>
                            <li class="mb-3">
                                <i class="fa fa-clock text-primary me-2"></i>
                                <span class="text-muted">Type:</span> {{ ucfirst($jobpost->type) }}
                            </li>
                            <li class="mb-3">
                                <i class="fa fa-money-bill text-primary me-2"></i>
                                <span class="text-muted">Salary:</span> {{ $formattedGaji }}
                            </li>
                            <li class="mb-3">
                                <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                <span class="text-muted">Location:</span> {{ $jobpost->lokasi }}
                            </li>
                            <li class="mb-4">
                                <i class="fa fa-envelope text-primary me-2"></i>
                                <span class="text-muted">Contact:</span> {{ $jobpost->email }}
                            </li>
                        </ul>

                        @if (Auth::user()->role == 'Pelamar')
                            <div class="mt-4">
                                @if ($userApply->isNotEmpty())
                                    @if ($userApply->first()->status == 'menunggu')
                                        <div class="alert alert-warning text-center mb-0">
                                            <i class="fas fa-clock me-2"></i>Application in Review
                                        </div>
                                    @elseif ($userApply->first()->status == 'diterima')
                                        <div class="alert alert-success text-center mb-0">
                                            <i class="fas fa-check-circle me-2"></i>Application Accepted
                                        </div>
                                    @else
                                        <a href="/jobs/{{ $jobpost->id }}/apply/create" 
                                           class="btn btn-primary w-100">Apply Now</a>
                                    @endif
                                @elseif ($otherApply->isNotEmpty())
                                    @if ($otherApply->first()->status == 'menunggu')
                                        <button class="btn btn-secondary w-100" disabled>Position Filled</button>
                                    @else
                                        <a href="/jobs/{{ $jobpost->id }}/apply/create" 
                                           class="btn btn-primary w-100">Apply Now</a>
                                    @endif
                                @else
                                    <a href="/jobs/{{ $jobpost->id }}/apply/create" 
                                       class="btn btn-primary w-100">Apply Now</a>
                                @endif
                            </div>
                        @endif

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->
@endsection