@extends('layout.main', ['title' => '| About'])

@section('content')

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <!-- Hero Section -->
    <div class="about-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="hero-title">About Find My Career</h1>
                    <p class="hero-subtitle">Connecting Talent with Opportunity</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission Section -->
    <section class="about-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.2s">
                    <div class="mission-card">
                        <div class="section-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h2>Our Mission</h2>
                        <p>At Find My Career, we believe everyone deserves to find work that aligns with their passion, skills, and ambitions. As an innovative job portal platform, we're committed to bridging the gap between job seekers and their ideal opportunities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5 wow fadeIn" data-wow-delay="0.1s">What We Offer</h2>
            <div class="row g-4">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <h3>Career Opportunities</h3>
                        <p>Access thousands of job listings across various industries and experience levels. From entry-level positions to executive roles, we have opportunities for everyone.</p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.2s">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3>Smart Search</h3>
                        <p>Our intuitive interface makes job hunting effortless. Use advanced filters to find positions based on industry, location, salary, and more.</p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.3s">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Industry Insights</h3>
                        <p>Stay informed with the latest industry trends, salary information, and career advice to make well-informed career decisions.</p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.4s">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3>Learning & Development</h3>
                        <p>Access educational resources and training materials to enhance your skills and stay competitive in today's job market.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Join Us Section -->
    <section class="join-section py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8 wow fadeIn" data-wow-delay="0.2s">
                    <h2 class="mb-4">Join Our Community</h2>
                    <p class="mb-5">Whether you're starting your career or looking for your next opportunity, Find My Career welcomes you to join our community of professionals. Take the first step towards your career success today.</p>
                    <a href="{{ route('regist') }}" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->

    <style>
    /* Hero Section */
    .about-hero {
        background: linear-gradient(135deg, #F29F58, #2980b9);
        padding: 100px 0 80px;
        color: white;
        text-align: center;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }

    .hero-subtitle {
        font-size: 1.25rem;
        opacity: 0.9;
    }

    /* Mission Section */
    .mission-card {
        text-align: center;
        padding: 3rem;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .section-icon {
        font-size: 2.5rem;
        color: #3498db;
        margin-bottom: 1.5rem;
    }

    /* Feature Cards */
    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: 12px;
        height: 100%;
        transition: transform 0.3s ease;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }

    .feature-card:hover {
        transform: translateY(-5px);
    }

    .feature-icon {
        font-size: 2rem;
        color: #3498db;
        margin-bottom: 1.25rem;
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin-bottom: 1rem;
        color: #2c3e50;
    }

    /* Join Section */
    .join-section {
        background: #f8f9fa;
    }

    .btn-primary {
        padding: 1rem 2.5rem;
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }

        .feature-card {
            margin-bottom: 1rem;
        }
    }
    </style>
@endsection