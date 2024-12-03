<style>
    .btn-primary {
        background-color: #F29F58 !important;
        border-color: #F29F58 !important;
    }

    .btn-primary:hover {
        background-color: #e88b45 !important;
        border-color: #e88b45 !important; 
    }

    .header-carousel .owl-nav button {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: #e88b45 !important;
        color: #fff !important;
        border: none;
        padding: 10px 15px;
        border-radius: 50%;
        font-size: 1.5rem;
        transition: background-color 0.3s ease;
        z-index: 10;
    }

    .header-carousel .owl-nav button:hover {
        background-color: #F29F58 !important;
    }

    .header-carousel .owl-nav .owl-prev {
        left: 15px;
    }

    .header-carousel .owl-nav .owl-next {
        right: 15px;
    }
</style>

<div class="container-fluid p-0">
    <div class="owl-carousel header-carousel position-relative">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-1.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: #e88c453d;">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Find the best start-up job that suits you.</h1>
                            <a href="{{ Auth::check() ? route('jobs') : route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="img/carousel-2.jpg" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: #e88c454f;">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h1 class="display-3 text-white animated slideInDown mb-4">Discover the perfect start-up job tailored just for you.</h1>
                            <a href="{{ Auth::check() ? '#mulai' : route('login') }}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Discover Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
