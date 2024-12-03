@extends('penyedia.layouts.main', ['title' => 'PenyediaDashboard'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center mb-3">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-building mr-2"></i>{{ $user->name }}'s Dashboard
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @if ($perusahaan)
                        <a href="/penyedia/company/{{ $perusahaan->id }}/edit" class="btn btn-outline-primary">
                            <i class="fas fa-edit mr-1"></i>Edit Company Profile
                        </a>
                    @else
                        <a href="/penyedia/company/create" class="btn btn-primary">
                            <i class="fas fa-plus-circle mr-1"></i>Add Company
                        </a>
                    @endif
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
                    <h3 class="card-title">
                        <i class="fas fa-users mr-2"></i>Job Applicants
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Position</th>
                                    <th>Applicant Name</th>
                                    <th width="15%">Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applyData as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data['posisi'] }}</td>
                                        <td>{{ $data['nama'] }}</td>
                                        <td>
                                            <span class="badge badge-{{ $data['status'] == 'Pending' ? 'warning' : ($data['status'] == 'Accepted' ? 'success' : 'danger') }}">
                                                {{ $data['status'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="/jobs/{{ $data['id_jobpost'] }}/apply/{{ $data['id_apply'] }}/edit" 
                                               class="btn btn-sm btn-info">
                                                <i class="fas fa-eye mr-1"></i>View
                                            </a>
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
@endsection