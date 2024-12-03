@extends('admin.layouts.main', ['title' => 'User Management'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-users mr-2"></i>User Management
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                            <i class="fas fa-list mr-2"></i>User List
                        </h3>
                        <a href="/admin/user/create" class="btn btn-primary">
                            <i class="fas fa-plus-circle mr-1"></i>Add New User
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="userTable" class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th width="15%">Role</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-{{ $item->role == 'Admin' ? 'danger' : ($item->role == 'Pelamar' ? 'success' : 'info') }} rounded-circle text-white me-3 user-avatar">
                                                    {{ strtoupper(substr($item->name, 0, 1)) }}
                                                </div>
                                                <span class="fw-semibold">{{ $item->name }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-envelope text-muted mr-2"></i>{{ $item->email }}
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $item->role == 'Admin' ? 'danger' : ($item->role == 'Pelamar' ? 'success' : 'info') }} px-3">
                                                {{ $item->role }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/admin/user/{{ $item->id }}/edit" class="btn btn-info btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="/admin/user/{{ $item->id }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm" 
                                                            onclick="return confirm('Are you sure you want to delete this user?')">
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

        <style>
            /* User Avatar Style */
            .user-avatar {
                width: 40px;
                height: 40px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
                font-size: 1.1rem;
                flex-shrink: 0;  /* Mencegah avatar mengecil */
            }
            
            /* Table Styles */
            .table td {
                vertical-align: middle;  /* Memastikan alignment vertikal konsisten */
            }
            
            /* Hover effect untuk baris tabel */
            .table tbody tr:hover {
                background-color: rgba(0,0,0,0.02);
            }
            
            /* Badge Styles */
            .badge {
                padding: 0.5rem 1rem;
                font-weight: 500;
                letter-spacing: 0.3px;
            }
            
            /* Button Group Styles */
            .btn-group .btn {
                padding: 0.5rem 0.75rem;
                border-radius: 0.25rem;
            }
            
            .btn-group .btn:not(:last-child) {
                margin-right: 0.25rem;
            }
            </style>
    </section>

    @push('scripts')
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 10
            });
        });
    </script>
    @endpush
@endsection