@extends('penyedia.layouts.main', ['title' => 'ApplyPost'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-file-alt mr-2"></i>Application Details
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                            <li class="breadcrumb-item active">Application Review</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row">
                <!-- Job Details Column -->
                <div class="col-lg-8">
                    <a href="{{ route('penyedia') }}" class="btn btn-outline-primary mb-4">
                        <i class="fas fa-arrow-left mr-2"></i>Back to Dashboard
                    </a>

                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <h3 class="text-primary mb-3">{{ $jobpost->posisi }}</h3>
                            <h5 class="text-muted mb-4">{{ $perusahaan->namaCompany }}</h5>

                            <div class="d-flex flex-wrap gap-4 mb-4">
                                <span class="badge badge-light">
                                    <i class="fas fa-map-marker-alt text-danger mr-2"></i>{{ $jobpost->lokasi }}
                                </span>
                                <span class="badge badge-light">
                                    <i class="fas fa-clock text-info mr-2"></i>{{ $jobpost->type }}
                                </span>
                                <span class="badge badge-light">
                                    <i class="fas fa-money-bill text-success mr-2"></i>{{ $formattedGaji }}
                                </span>
                            </div>

                            <div class="mb-4">
                                <h5 class="font-weight-bold mb-3">Job Description</h5>
                                <p class="text-justify">{{ $jobpost->deskripsi }}</p>
                            </div>

                            <div>
                                <h5 class="font-weight-bold mb-3">Company Description</h5>
                                <p class="text-justify">{{ $perusahaan->detail }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Applicant Profile Column -->
                <div class="col-lg-4">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">
                                <i class="fas fa-user-circle mr-2"></i>Applicant Profile
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-4">
                                <table class="table table-borderless">
                                    <tr>
                                        <td width="30%"><i class="fas fa-user text-primary mr-2"></i>Name</td>
                                        <td>: {{ $profile->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-envelope text-primary mr-2"></i>Email</td>
                                        <td>: {{ $profile->email }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-phone text-primary mr-2"></i>Phone</td>
                                        <td>: {{ $profile->no_hp }}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-birthday-cake text-primary mr-2"></i>Age</td>
                                        <td>: {{ $profile->umur }} years</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fas fa-venus-mars text-primary mr-2"></i>Gender</td>
                                        <td>: {{ ucfirst($profile->jenis_kelamin) }}</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="mb-4">
                                <h6 class="font-weight-bold mb-3"><i class="fas fa-user-edit text-primary mr-2"></i>About</h6>
                                <p class="text-justify">{{ $profile->deskripsi }}</p>
                            </div>

                            <div class="mb-4">
                                <h6 class="font-weight-bold mb-3">
                                    <i class="fas fa-certificate text-primary mr-2"></i>Documents
                                </h6>
                                @if ($skill && count($skill) > 0)
                                    @foreach ($skill as $item)
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-file-pdf text-danger mr-2"></i>
                                            <a href="{{ asset('storage/photo-user-' . $profile->id . '/' . $item->skill) }}"
                                               target="_blank" class="text-primary">
                                                {{ $item->skill }}
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">No documents uploaded</p>
                                @endif
                            </div>

                            @if ($userApply->status == 'menunggu')
                                <form action="/jobs/{{ $jobpost->id }}/apply/{{ $userApply->id }}" method="post">
                                    @csrf
                                    @method('put')
                                    <div class="form-group">
                                        <select name="status" class="form-control mb-3">
                                            <option value="diterima">Accept Application</option>
                                            <option value="dibatalkan">Reject Application</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary btn-block">
                                            <i class="fas fa-paper-plane mr-2"></i>Send Decision
                                        </button>
                                    </div>
                                </form>
                            @else
                                <div class="text-center">
                                    @if ($userApply->status == 'diterima')
                                        <div class="alert alert-success">
                                            <i class="fas fa-check-circle mr-2"></i>Application Accepted
                                        </div>
                                    @else
                                        <div class="alert alert-danger">
                                            <i class="fas fa-times-circle mr-2"></i>Application Rejected
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection