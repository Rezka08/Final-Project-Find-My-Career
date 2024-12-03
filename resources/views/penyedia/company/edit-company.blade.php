@extends('Penyedia.layouts.main', ['title' => 'PenyediaDashboard'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="d-flex align-items-center gap-3">
                        <a href="/penyedia" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left mr-1"></i> Back
                        </a>
                        <h1 class="m-0 text-primary">
                            <i class="fas fa-building mr-2"></i>Edit Company
                        </h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                            <li class="breadcrumb-item"><a href="/penyedia">Profile</a></li>
                            <li class="breadcrumb-item active">Edit Company</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content mt-4">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-edit mr-2"></i>Company Information
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="/penyedia/company/{{ $data->id }}" method="post">
                                @csrf
                                @method('put')
                                
                                <div class="form-group">
                                    <label class="form-label">Company Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-building"></i>
                                            </span>
                                        </div>
                                        <input type="text" 
                                               class="form-control @error('namaCompany') is-invalid @enderror"
                                               name="namaCompany" 
                                               value="{{ old('namaCompany', $data->namaCompany) }}" 
                                               placeholder="Enter company name"
                                               required>
                                        @error('namaCompany')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Company Description</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-info-circle"></i>
                                            </span>
                                        </div>
                                        <textarea class="form-control @error('detail') is-invalid @enderror" 
                                                  name="detail"
                                                  rows="5"
                                                  placeholder="Enter company description"
                                                  required>{{ old('detail', $data->detail) }}</textarea>
                                        @error('detail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="text-muted">
                                        Provide a comprehensive description of your company including its mission, values, and work culture.
                                    </small>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save mr-1"></i> Save Changes
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