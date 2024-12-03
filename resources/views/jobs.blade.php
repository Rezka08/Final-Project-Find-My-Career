@extends('layout.main', ['title' => '| Jobs'])

<style>
    /* Content spacing */
    .content-wrapper {
        padding-top: 76px;
    }

    @media (max-width: 768px) {
        .content-wrapper {
            padding-top: 66px;
        }
        
        .dropdown-menu {
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
            background-color: transparent;
            border: 0;
            box-shadow: none;
        }
    }

    /* Content Padding for Fixed Navbar */
    .content-wrapper {
        padding-top: 0px; /* Navbar height + extra padding */
    }

    /* Search Section Styles */
    .search-section {
        background: linear-gradient(135deg, #F29F58 0%, #F29F58 100%);
        padding: 30px 0;
    }

    .search-section .form-control,
    .search-section .form-select {
        height: 45px;
        border-radius: 5px;
    }

    .search-section .btn {
        height: 45px;
    }

    /* Footer Styles */
    .footer {
        background-color: #2c3e50;
        color: white;
    }

    .social-links a {
        color: white;
        margin: 0 10px;
        font-size: 1.5rem;
        transition: color 0.3s ease;
    }

    .social-links a:hover {
        color: #3498db;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .content-wrapper {
            padding-top: 66px;
        }
    }
</style>

@include('partials.navbar')

@include('partials.search')

@include('partials.jobs')
<!-- Content Wrapper -->
<div class="content-wrapper">
    <!-- Search Section -->
    {{-- <div class="container-xxl py-5">
        <div id="mulai" class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Explore By Category</h1>
            <div class="row g-4">
                @foreach ($jobposts as $jobpost)
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="{{ route('searchJobs', ['category' => $jobpost->posisi]) }}">
                            {{-- <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i> --}}
                            {{-- <h6 class="mb-3">{{ $jobpost->posisi }}</h6>
                            <p class="mb-0">{{ $jobpost->similarPositionsCount }} Vacancy</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    
    
    
@extends('partials.footer')
        
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> --}}