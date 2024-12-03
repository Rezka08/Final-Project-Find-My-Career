@extends('admin.layouts.main', ['title' => 'Applicant Management'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-users mr-2"></i>Applicant Management
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active">Applications</li>
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

            <!-- Applications Table -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-list mr-2"></i>Applications List
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="applicantsTable" class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Company</th>
                                    <th>Position</th>
                                    <th>Applicant</th>
                                    <th width="15%">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applicants as $index => $applicant)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary rounded-circle p-2 text-white mr-3">
                                                    <i class="fas fa-building"></i>
                                                </div>
                                                {{ $applicant->namaCompany }}
                                            </div>
                                        </td>
                                        <td>
                                            <i class="fas fa-briefcase text-primary mr-2"></i>
                                            {{ $applicant->posisi }}
                                        </td>
                                        <td>
                                            
                                            <div class="d-flex align-items-center">
                                                <div class="bg-secondary rounded-circle p-2 text-white mr-3">
                                                    {{ strtoupper(substr($applicant->namaProfile, 0, 1)) }}
                                                </div>
                                                <div>
                                                    <div>{{ $applicant->namaProfile }}</div>
                                                    <small class="text-muted">Applied {{ \Carbon\Carbon::parse($applicant->created_at)->diffForHumans() }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $applicant->status == 'Accepted' ? 'success' : ($applicant->status == 'Pending' ? 'warning' : 'danger') }}">
                                                {{ $applicant->status }}
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <!-- View Button -->
                                                <a href="/admin/profile/{{ $applicant->id }}" 
                                                   class="btn btn-info btn-sm" 
                                                   title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                        
                                                <!-- Accept Button -->
                                                <form action="/admin/apply/{{ $applicant->id }}/accept" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" 
                                                            class="btn btn-success btn-sm" 
                                                            title="Accept Application"
                                                            onclick="return confirm('Are you sure you want to accept this application?')">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </form>
                                        
                                                <!-- Reject Button -->
                                                <form action="/admin/apply/{{ $applicant->id }}/reject" 
                                                      method="POST" 
                                                      class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" 
                                                            class="btn btn-danger btn-sm" 
                                                            title="Reject Application"
                                                            onclick="return confirm('Are you sure you want to reject this application?')">
                                                        <i class="fas fa-times"></i>
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
            $('#applicantsTable').DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "pageLength": 10
            });
        });
    </script>
    @endpush
@endsection