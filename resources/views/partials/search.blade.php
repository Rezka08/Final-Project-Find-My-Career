<style>
    .search-section {
        padding: 3rem 0;
        background: linear-gradient(to right, rgba(255,255,255,0.9), rgba(255,255,255,0.95));
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        margin-top: 0px;
        position: relative;
        z-index: 100;
        border-radius: 15px;
    }
    
    .search-section .form-control,
    .search-section .form-select {
        height: 50px;
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 0.5rem 1rem;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        background-color: #fff;
    }
    
    .search-section .form-control:focus,
    .search-section .form-select:focus {
        border-color: #F29F58;
        box-shadow: 0 0 0 0.2rem rgba(242, 159, 88, 0.15);
    }
    
    .search-section .btn-search {
        height: 50px;
        background: linear-gradient(135deg, #F29F58, #e88b45);
        border: none;
        border-radius: 10px;
        color: #fff;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .search-section .btn-search:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(232, 139, 69, 0.3);
    }
    
    @media (max-width: 768px) {
        .search-section {
            margin-top: -50px;
            padding: 2rem 1rem;
        }
        
        .search-section .row > div {
            margin-bottom: 1rem;
        }
    }
    </style>
    
    <div class="search-section wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <form action="{{ route('searchJobs') }}" method="GET">
                <div class="row g-3">
                    <div class="col-md-10">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                    <input type="text" 
                                           name="keyword" 
                                           class="form-control border-start-0" 
                                           placeholder="Search keywords..." 
                                           autocomplete="off"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-map-marker-alt text-muted"></i>
                                    </span>
                                    <select name="location" class="form-select border-start-0">
                                        <option value="" selected>Select Location</option>
                                        @foreach ($lokasi as $data)
                                            <option value="{{ $data->lokasi }}">{{ $data->lokasi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fas fa-building text-muted"></i>
                                    </span>
                                    <select name="perusahaan" class="form-select border-start-0">
                                        <option value="" selected>Select Company</option>
                                        @foreach ($perusahaan as $data)
                                            <option value="{{ $data->id }}">{{ $data->namaCompany }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-search w-100">
                            Search Jobs
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>