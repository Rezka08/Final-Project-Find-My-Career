@extends('layout.main', ['title' => '| Contact'])

@section('content')

    <!-- Navbar Start -->
    @include('partials.navbar')
    <!-- Navbar End -->

    <!-- Hero Section -->
    <div class="contact-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4 wow fadeInUp" data-wow-delay="0.1s">Get in Touch</h1>
                    <p class="lead mb-0 wow fadeInUp" data-wow-delay="0.2s">Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Message -->
    @if (session()->has('success'))
        <div class="floating-alert">
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <!-- Contact Info Cards -->
    <div class="container contact-cards">
        <div class="row g-4 justify-content-center">
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                <div class="contact-card">
                    <div class="card-icon">
                        <i class="fa fa-map-marker-alt"></i>
                    </div>
                    <h5>Office Location</h5>
                    <a href="https://maps.app.goo.gl/nGwXbN3y3QjQkJBu5">Jl. Andi Tadde, Makassar,<br>Indonesia</a>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                <div class="contact-card">
                    <div class="card-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <h5>Email Us</h5>
                    <a href="mailto:rreska9@gmail.com">rreska9@gmail.com</a>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                <div class="contact-card">
                    <div class="card-icon">
                        <i class="fa fa-phone-alt"></i>
                    </div>
                    <h5>Call Us</h5>
                    <a href="https://wa.me/62811581233">+62-811-581-233</a>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.7s">
                <div class="contact-card">
                    <div class="card-icon">
                        <i class="fa fa-share-alt"></i>
                    </div>
                    <h5>Follow Us</h5>
                    <a href="https://instagram.com/rzkaaa.08" target="_blank">Instagram</a><br>
                    <a href="https://linkedin.com/company" target="_blank">LinkedIn</a>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="0.9s">
                <div class="contact-card">
                    <div class="card-icon">
                        <i class="fa fa-clock"></i>
                    </div>
                    <h5>Operating Hours</h5>
                    <p>Mon - Fri: 9 AM - 5 PM<br>Sat - Sun: Closed</p>
                </div>
            </div>
            <div class="col-md-4 wow fadeIn" data-wow-delay="1.1s">
                <div class="contact-card">
                    <div class="card-icon">
                        <i class="fa fa-headset"></i>
                    </div>
                    <h5>Support Center</h5>
                    <p>Need assistance? Visit our <a href="/support">Support Center</a>.</p>
                </div>
            </div>            
        </div>
    </div>


    <!-- Footer Start -->
    @include('partials.footer')
    <!-- Footer End -->

    <style>
    /* Hero Section */
    .contact-hero {
        background: linear-gradient(135deg, #2980b9, #F29F58);
        padding: 100px 0;
        color: white;
        margin-bottom: -50px;
    }

    /* Floating Alert */
    .floating-alert {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1050;
        min-width: 300px;
    }

    .alert {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Contact Cards Section */
    .contact-cards {
        margin-top: -30px;
        padding: 30px 0;
    }

    .contact-card {
        background: white;
        padding: 2rem;
        border-radius: 15px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        height: 100%;
        transition: transform 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
    }

    .card-icon {
        width: 70px;
        height: 70px;
        background: #F29F58;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        color: white;
        font-size: 1.5rem;
    }

    .contact-card h5 {
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .contact-card a {
        color: #3498db;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contact-card a:hover {
        color: #2980b9;
    }

    /* Form Section */
    .form-section {
        background: #f8f9fa;
        padding: 80px 0;
    }

    .contact-form-card {
        background: white;
        padding: 3rem;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
    }

    .form-floating > label {
        color: #6c757d;
    }

    .form-control {
        border: 2px solid #e9ecef;
        border-radius: 10px;
        padding: 1rem;
    }

    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }

    /* Submit Button */
    .submit-button {
        width: 100%;
        padding: 1rem;
        border: none;
        border-radius: 10px;
        background: #F29F58;
        color: white;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(52, 152, 219, 0.3);
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .contact-hero {
            padding: 60px 0;
        }

        .contact-form-card {
            padding: 1.5rem;
        }

        .form-section {
            padding: 40px 0;
        }
    }
    </style>

    <!-- Form Validation Script -->
    <script>
        (() => {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
@endsection