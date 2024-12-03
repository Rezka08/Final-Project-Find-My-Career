@extends('admin.layouts.main', ['title' => 'ManageProfile'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-user-circle mr-2"></i>Profile Management
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profiles</li>
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
                            <i class="fas fa-list mr-2"></i>Profile List
                        </h3>
                        <a href="/admin/profile/create" class="btn btn-primary">
                            <i class="fas fa-plus-circle mr-1"></i>Add New Profile
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profile as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-info rounded-circle p-2 text-white mr-3">
                                                    {{ strtoupper(substr($item->nama, 0, 1)) }}
                                                </div>
                                                {{ $item->nama }}
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-envelope text-muted mr-2"></i>{{ $item->email }}
                                        </td>
                                        <td>
                                            <i class="fas fa-phone text-muted mr-2"></i>{{ $item->no_hp }}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/admin/profile/{{ $item->id }}" class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="/admin/profile/{{ $item->id }}/edit" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="/admin/profile/{{ $item->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Are you sure you want to delete this profile?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 10
            });
        });
    </script>
    @endpush
@endsection