@extends('Penyedia.layouts.main', ['title' => 'EditJobpost'])

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
                            <i class="fas fa-edit mr-2"></i>Edit Job Post
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/penyedia">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/penyedia/jobpost">Jobs</a></li>
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
                                <i class="fas fa-briefcase mr-2"></i>Job Information
                            </h3>
                        </div>
                        
                        <div class="card-body">
                            <form action="/penyedia/jobpost/{{ $data->id }}" method="post">
                                @csrf
                                @method('put')
                                
                                <div class="row">
                                    <!-- Position and Company -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Position Title</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('posisi') is-invalid @enderror"
                                                name="posisi" value="{{ old('posisi', $data->posisi) }}" required>
                                            @error('posisi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Company</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-building"></i></span>
                                            </div>
                                            <select name="company" class="form-control">
                                                @foreach ($perusahaan as $item)
                                                    <option value="{{ $item->id }}" {{ $item->id == $data->company_id ? 'selected' : '' }}>
                                                        {{ $item->namaCompany }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Salary and Type -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Salary</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('gaji') is-invalid @enderror"
                                                name="gaji" value="{{ old('gaji', $data->gaji) }}" required>
                                            @error('gaji')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Employment Type</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <select name="type" class="form-control">
                                                <option value="full-time" {{ $data->type == 'full-time' ? 'selected' : '' }}>Full Time</option>
                                                <option value="part-time" {{ $data->type == 'part-time' ? 'selected' : '' }}>Part Time</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Contact Information -->
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Contact Email</label>
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

                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Location</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror"
                                                name="lokasi" value="{{ old('lokasi', $data->lokasi) }}" required>
                                            @error('lokasi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Job Description -->
                                    <div class="col-12 mb-3">
                                        <label class="form-label">Job Description</label>
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
                                    <a href="/penyedia/jobpost" class="btn btn-secondary mr-2">Cancel</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Update Job Post
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