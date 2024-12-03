<style>
    /* Main Section Styles */
    .job-listing-section {
        padding: 5rem 0;
        background-color: #fff;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 3rem;
    }
    
    /* Tab Navigation Styles */
    .job-filter-tabs {
        display: flex;
        justify-content: center;
        gap: 1rem;
        margin-bottom: 3rem;
    }
    
    .tab-button {
        padding: 0.75rem 2rem;
        border: none;
        border-radius: 50px;
        font-weight: 500;
        color: #6c757d;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }
    
    .tab-button.active {
        color: #fff;
        background: linear-gradient(135deg, #F29F58, #e88b45);
        box-shadow: 0 4px 15px rgba(232, 139, 69, 0.2);
    }
    
    /* Job Card Styles */
    .job-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .job-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }
    
    .job-card-content {
        padding: 1.5rem;
    }
    
    .job-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1.5rem;
        line-height: 1.4;
    }
    
    .job-info {
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        color: #6c757d;
    }
    
    .info-item i {
        color: #F29F58;
        width: 16px;
    }
    
    .view-details-btn {
        width: 100%;
        padding: 0.75rem;
        border: none;
        border-radius: 10px;
        background: linear-gradient(135deg, #F29F58, #e88b45);
        color: #fff;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .view-details-btn:hover {
        background: linear-gradient(135deg, #e88b45, #F29F58);
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(232, 139, 69, 0.3);
    }
    
    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .section-title {
            font-size: 2rem;
        }
        
        .job-filter-tabs {
            flex-wrap: wrap;
        }
        
        .tab-button {
            padding: 0.5rem 1.5rem;
        }
    }
    </style>
    
    <div class="job-listing-section wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="section-title text-center">Find Your Dream Job</h1>
            
            <!-- Job Type Filter -->
            <ul class="nav job-filter-tabs" id="jobTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="tab-button active" data-bs-toggle="pill" data-bs-target="#tab-1">
                        <i class="fas fa-briefcase me-2"></i>All Jobs
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="tab-button" data-bs-toggle="pill" data-bs-target="#tab-2">
                        <i class="fas fa-business-time me-2"></i>Full Time
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="tab-button" data-bs-toggle="pill" data-bs-target="#tab-3">
                        <i class="fas fa-clock me-2"></i>Part Time
                    </button>
                </li>
            </ul>
    
            <!-- Job Listings -->
            <div class="tab-content">
                <!-- All Jobs -->
                <div id="tab-1" class="tab-pane fade show active">
                    <div class="row g-4">
                        @foreach ($job as $data)
                            <div class="col-md-6 col-lg-4">
                                <div class="job-card">
                                    <div class="job-card-content">
                                        <h5 class="job-title">{{ $data->posisi }}</h5>
                                        <div class="job-info">
                                            <div class="info-item">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                                <span>{{ $data->lokasi }}</span>
                                            </div>
                                            <div class="info-item">
                                                <i class="far fa-clock text-primary"></i>
                                                <span>{{ $data->type }}</span>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-money-bill-wave text-primary"></i>
                                                <span>Rp {{ number_format($data->gaji, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('showJobs', $data->id) }}" class="view-details-btn">
                                            View Details <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    
                <!-- Full Time -->
                <div id="tab-2" class="tab-pane fade">
                    <div class="row g-4">
                        @foreach ($fulltime as $full)
                            <div class="col-md-6 col-lg-4">
                                <div class="job-card">
                                    <div class="job-card-content">
                                        <h5 class="job-title">{{ $full->posisi }}</h5>
                                        <div class="job-info">
                                            <div class="info-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>{{ $full->lokasi }}</span>
                                            </div>
                                            <div class="info-item">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $full->type }}</span>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-money-bill-wave"></i>
                                                <span>Rp {{ number_format($full->gaji, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('showJobs', $full->id) }}" class="view-details-btn">
                                            View Details <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    
                <!-- Part Time -->
                <div id="tab-3" class="tab-pane fade">
                    <div class="row g-4">
                        @foreach ($parttime as $part)
                            <div class="col-md-6 col-lg-4">
                                <div class="job-card">
                                    <div class="job-card-content">
                                        <h5 class="job-title">{{ $part->posisi }}</h5>
                                        <div class="job-info">
                                            <div class="info-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>{{ $part->lokasi }}</span>
                                            </div>
                                            <div class="info-item">
                                                <i class="far fa-clock"></i>
                                                <span>{{ $part->type }}</span>
                                            </div>
                                            <div class="info-item">
                                                <i class="fas fa-money-bill-wave"></i>
                                                <span>Rp {{ number_format($part->gaji, 0, ',', '.') }}</span>
                                            </div>
                                        </div>
                                        <a href="{{ route('showJobs', $part->id) }}" class="view-details-btn">
                                            View Details <i class="fas fa-arrow-right ms-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>