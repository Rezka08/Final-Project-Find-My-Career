@extends('layout.main', ['title' => '| Jobs'])

@section('content')
    @include('partials.navbar')
    @include('partials.search')

    <div class="job-listing-section py-5">
        <div class="container">
            <h1 class="section-title text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">
                Available Positions
            </h1>

            <div class="job-listings wow fadeInUp" data-wow-delay="0.3s">
                @foreach ($jobs as $data)
                    <div class="job-card mb-4 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="job-card-content p-4">
                            <div class="row align-items-center">
                                <div class="col-lg-8">
                                    <div class="job-info">
                                        <h4 class="job-title mb-3">{{ $data->posisi }}</h4>
                                        <div class="job-meta">
                                            <div class="meta-item">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                                <span>{{ $data->lokasi }}</span>
                                            </div>
                                            <div class="meta-item">
                                                <i class="far fa-clock text-primary"></i>
                                                <span>{{ $data->type }}</span>
                                            </div>
                                            <div class="meta-item">
                                                <i class="fas fa-money-bill-wave text-primary"></i>
                                                <span>Rp {{ number_format($data->gaji, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                                    <a href="{{ route('showJobs', $data->id) }}" class="view-details-btn">
                                        View Details
                                        <i class="fas fa-arrow-right ms-2"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('partials.footer')

    <style>
    .job-listing-section {
        background-color: #f8f9fa;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .job-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .job-title {
        color: #2c3e50;
        font-weight: 600;
    }

    .job-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        font-size: 0.95rem;
    }

    .meta-item i {
        color: #F29F58;
        width: 16px;
    }

    .view-details-btn {
        display: inline-block;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #F29F58, #e88b45);
        color: #fff;
        border-radius: 50px;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .view-details-btn:hover {
        background: linear-gradient(135deg, #e88b45, #F29F58);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(232, 139, 69, 0.3);
        color: #fff;
    }

    @media (max-width: 992px) {
        .job-meta {
            margin-bottom: 1rem;
        }
        
        .meta-item {
            font-size: 0.9rem;
        }
    }
    </style>
@endsection