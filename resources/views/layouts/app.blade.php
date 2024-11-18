<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SPEAKING HEARTS | {{$title}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="{% static 'img/favicon.ico' %}" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link href="{{asset('storage/front/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('storage/front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <link href="{{asset('storage/front/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('storage/front/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow border-top border-5 border-primary sticky-top p-0">
        <a href="/" class="navbar-brand bg-primary d-flex align-items-center px-4 px-lg-5">
            <h2 class="mb-2 text-white">SPEAKING HEARTS</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <!-- <a href="/" class="nav-item nav-link">Home</a> -->
                <a href="/" class="nav-item nav-link">Articles</a>
                <a href="/music" class="nav-item nav-link">Music</a>
                <a href="/poetry" class="nav-item nav-link">Poetry</a>
                <a href="/books" class="nav-item nav-link">Books</a>
            </div>
            <h4 class="m-0 pe-lg-5 d-none d-lg-block"><i class="fa fa-phone text-primary me-3"></i>+254 701 583 807
            </h4>
        </div>
    </nav>
    <!-- Navbar End -->
    <div class="">
        @yield('content')
    </div>
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-1 wow fadeIn" data-wow-delay="0.1s"
        style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Juja, Nairobi, Kenya</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+254 701 583 807</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@speakinghearts.co.ke</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fa-brands fa-x-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fa-brands fa-facebook"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fa-brands fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fa-brands fa-linkedin"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fa-brands fa-tiktok"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="/poems">Poems</a>
                    <a class="btn btn-link" href="/music">Music</a>
                    <a class="btn btn-link" href="/books">Books</a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p></p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <form action="" method="post">
                            <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="submit"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy;{{date('Y')}} <a class="border-bottom" href="#">Speaking Hearts</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="{{asset('storage/front/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('storage/front/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('storage/front/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('storage/front/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('storage/front/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('storage/front/js/main.js')}}"></script>
</body>

</html>