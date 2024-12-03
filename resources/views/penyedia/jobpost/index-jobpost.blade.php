@extends('Penyedia.layouts.main', ['title' => 'Managejobpost'])

@section('content')
    <div class="content-header bg-white shadow-sm">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h1 class="m-0 text-primary">
                        <i class="fas fa-briefcase mr-2"></i>Job Postings
                    </h1>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb float-sm-right bg-transparent mb-0">
                            <li class="breadcrumb-item"><a href="/penyedia">Home</a></li>
                            <li class="breadcrumb-item active">Job Posts</li>
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
                    <div class="d-flex align-items-center justify-content-between">
                        <h3 class="card-title">
                            <i class="fas fa-list mr-2"></i>Job Listings
                        </h3>
                        <a href="/penyedia/jobpost/create" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus-circle mr-1"></i>Add New Job
                        </a>
                    </div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>Location</th>
                                    <th width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item['jobpost']->posisi }}</td>
                                        <td>{{ $item['perusahaan']->namaCompany }}</td>
                                        <td><i class="fas fa-map-marker-alt text-danger mr-1"></i>{{ $item['jobpost']->lokasi }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="/penyedia/jobpost/{{ $item['jobpost']->id }}" 
                                                   class="btn btn-info btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="/penyedia/jobpost/{{ $item['jobpost']->id }}/edit" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="/penyedia/jobpost/{{ $item['jobpost']->id }}" 
                                                      method="post" 
                                                      class="d-inline"
                                                      onsubmit="return confirm('Are you sure you want to delete this job post?')">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <i class="fas fa-folder-open text-muted mb-2" style="font-size: 3em;"></i>
                                            <p class="text-muted mb-0">No job posts available</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection