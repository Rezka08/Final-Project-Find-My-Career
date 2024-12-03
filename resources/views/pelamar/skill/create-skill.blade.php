@extends('pelamar.layouts.main', ['title' => 'CreateSkill'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-file-upload mr-2"></i>Upload CV/Sertifikat
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent">
                            <li class="breadcrumb-item"><a href="/pelamar">Home</a></li>
                            <li class="breadcrumb-item"><a href="/pelamar/skill">Documents</a></li>
                            <li class="breadcrumb-item active">Upload</li>
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
                            <h3 class="card-title">Upload Document</h3>
                        </div>
                        <div class="card-body">
                            <form action="/pelamar/skill" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <select class="form-control" name="nama" readonly>
                                            <option value="{{ $profile->id }}">{{ $profile->nama }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Document File</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('inputfile') is-invalid @enderror" 
                                               id="inputfile" name="inputfile">
                                        <label class="custom-file-label" for="inputfile">Choose file</label>
                                        @error('inputfile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <small class="text-muted">Supported formats: PDF, DOC, DOCX. Max size: 2MB</small>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-upload mr-1"></i> Upload Document
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
    @endpush
@endsection