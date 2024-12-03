@extends('pelamar.layouts.main', ['title' => 'ManageSkill'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-file-alt mr-2"></i>Document Management
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/pelamar">Dashboard</a></li>
                            <li class="breadcrumb-item active">Documents</li>
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

            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">
                            <i class="fas fa-list mr-2"></i>Document List
                        </h3>
                        <a href="/pelamar/skill/create" class="btn btn-primary">
                            <i class="fas fa-upload mr-1"></i>Upload New Document
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="documentTable" class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Name</th>
                                    <th>File Name</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($profile)
                                    @forelse ($skill as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="bg-primary rounded-circle p-2 text-white mr-3">
                                                        {{ strtoupper(substr($profile->nama, 0, 1)) }}
                                                    </div>
                                                    {{ $profile->nama }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-file-pdf text-danger mr-2"></i>
                                                    {{ $item->skill }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ asset('storage/photo-user-' . $profile->id . '/' . $item->skill) }}" 
                                                       target="_blank" 
                                                       class="btn btn-info btn-sm">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <form action="/pelamar/skill/{{ $item->id }}" 
                                                          method="post" 
                                                          class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" 
                                                                class="btn btn-danger btn-sm" 
                                                                onclick="return confirm('Are you sure you want to delete this document?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center py-4">
                                                <div class="empty-state">
                                                    <i class="fas fa-file-upload text-muted mb-3"></i>
                                                    <h5>No documents uploaded yet</h5>
                                                    <p class="text-muted mb-0">Start by uploading your CV or certificates</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
    .empty-state {
        text-align: center;
        padding: 2rem;
    }

    .empty-state i {
        font-size: 3rem;
        display: block;
        margin-bottom: 1rem;
    }

    #documentTable td {
        vertical-align: middle;
    }

    .btn-group .btn {
        padding: 0.25rem 0.5rem;
    }

    .table thead th {
        border-bottom: 2px solid #dee2e6;
    }
    </style>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#documentTable').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 10,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Search documents...",
                    "paginate": {
                        "previous": "<i class='fas fa-chevron-left'>",
                        "next": "<i class='fas fa-chevron-right'>"
                    }
                }
            });
        });
    </script>
    @endpush
@endsection