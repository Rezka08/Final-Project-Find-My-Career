@extends('layout.main', ['title' => '| Jobs'])
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('img/carousel-1.jpg');
            background-size: cover;
            background-position: center;
            min-height: 500px;
            color: #ffffff;
            padding-top: 80px;
        }

        .card-title {
            color: #F29F58; /* Warna teks judul kartu */
            font-weight: bold; /* Tambahan opsional untuk membuat teks lebih tegas */
        }

        .card-text {
            color: #6c757d;
            font-size: 16px;
        }

        .feature-card .fa-search {
            transition: transform 0.3s ease;
            color: #F29F58; /* Warna jingga */
        }

        /* Warna ikon saat hover pada kartu */
        .feature-card:hover .fa-3x {
            color: #e88b45; /* Warna jingga lebih gelap saat hover */
        }

        .feature-card:hover .card-text  {
            transform: translateY(-5px);
            color: #5a6268;
        }

        .job-card {
            transition: transform 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .category-card {
            border: none;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        
    </style>
</head>
<body>

@extends('partials.navbar')

@include('partials.caraousel')

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-search fa-3x mb-3 text-primary"></i>
                            <h3 class="card-title">Easy to Search</h3>
                            <p class="card-text">Find the perfect job matching your skills and preferences.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-file-alt fa-3x mb-3 text-primary"></i>
                            <h3 class="card-title">Apply Instantly</h3>
                            <p class="card-text">Quick and easy application process with your profile.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-bell fa-3x mb-3 text-primary"></i>
                            <h3 class="card-title">Job Alerts</h3>
                            <p class="card-text">Get notified about new jobs matching your preferences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@extends('partials.footer')

</body>
</html>   