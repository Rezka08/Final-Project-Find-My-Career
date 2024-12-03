<style>
        .footer {
            background-color: #F29F58;
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

</style>

<footer class="footer py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Find My Career</h5>
                <p>Your trusted platform for finding the perfect job opportunity.</p>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('about') }}" class="text-white">About Us</a></li>
                    <li><a href="{{ route('contact') }}" class="text-white">Contact Us</a></li>
                    @auth
                        <li><a href="{{ route('jobs') }}" class="text-white">Browse Jobs</a></li>
                    @endauth
                </ul>
            </div>
            <div class="col-md-4 mb-4">
                <h5 class="mb-3">Contact Info</h5>
                <ul class="list-unstyled">
                    <li><i class="fas fa-map-marker-alt me-2"></i> Jl. Andi Tadde, Makassar, Indonesia</li>
                    <li><i class="fas fa-phone me-2"></i> +62 811 581 233</li>
                    <li><i class="fas fa-envelope me-2"></i> fmc@gmail.com</li>
                </ul>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <div class="social-links mb-3">
                <a href="#"><i class="fab fa-facebook"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-linkedin"></i></a>
                <a href="https://instagram.com/rzkaaa.08"><i class="fab fa-instagram"></i></a>
            </div>
            <p>&copy; 2024 Find My Career. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>