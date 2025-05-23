<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.4.1/font/bootstrap-icons.min.css">
    <style>
        .footer-links { 
            color: white; 
            padding: 10px; 
        } 
        
        .footer-links h4 { 
            color: white; 
        } 
        
        .footer-links ul { 
            list-style: none; 
            padding: 0; 
        } 
        
        .footer-links ul li { 
            margin-bottom: 10px; 
        } 
        
        .footer-links ul li a { 
            color: white; 
            text-decoration: none; 
        } 
        
        .footer-links ul li a:hover { 
            text-decoration: underline;
        }

        .social-links a { 
            color: white; 
            font-size: 20px; 
            margin-right: 15px; 
        } 
        
        .social-links a:hover { 
            color: #1abc9c; 
        }

        .hover-effect:hover {
            color: #2c92c4 !important;
            background-color: #ffffff; /* Blue background */
            transition: all 0.3s ease-in-out;
        }

        .nav-link.active {
            color: #2c92c4 !important;
            background-color: #fff;
        }

        nav {
            background-color: #003366;
            color: white  !important;
        }

        .navbar .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            left: auto;
            z-index: 1000;
            float: none;
            background-color: #ffffff;
            border: 1px solid #ccc;
            padding: 0.5rem;
            width: max-content;
            border-radius: 5px;
            box-shadow: 0 0.5 rem 1rem rgba(0,0,0,0.15);
        }

        .navbar-collapse {
            justify-content: center;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;utf8,<svg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'><path stroke='rgba(255, 255, 255, 1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/></svg>");
        }
        .dropdown-item:{
            text-align: left
        }

        .dropdown-item:hover{
            background-color: #f8f9fa;
            color: #000;
        }
    </style>
</head>

<body>
    <header class="header sticky-top align-items-center">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container-fluid position-relative align-items-center justify-content-between">
                <!-- Logo di kiri -->
                <a class="navbar-brand mb-0 logo d-flex align-items-center text-white" href="/">
                    <img src="/storage/other_images/LogoWebsite.png" alt="" width="50" height="50" class="d-inline-block align-next-top">
                    <h2>DeepIntoOcean</h2>
                </a>

                <!-- Tombol untuk mobile -->
                <div class="d-flex order-md-1 ms-auto">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                <!-- Dropdown untuk mobile -->
                <ul class="navbar-nav d-md-none order-md-2">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="/login" class="dropdown-item fw-bold">Login</a>
                            <a href="/regist" class="dropdown-item fw-bold">Register</a>
                        </div>
                    </li>
                </ul>

                <!-- Navigasi di tengah -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
                    <ul class="navbar-nav mb-2 mb-lg-0"> 
                        <li class="nav-item"> 
                            <a class="nav-link text-white mx-3 hover-effect rounded-pill text-center fw-bold" href="/">Home</a>
                        </li> 
                        <li class="nav-item"> 
                            <a class="nav-link text-white mx-3 hover-effect rounded-pill text-center fw-bold" href="/about-us">About Us</a> 
                        </li> 
                        <li class="nav-item"> 
                            <a class="nav-link text-white mx-3 hover-effect rounded-pill text-center fw-bold" href="/donate">Donate</a> 
                        </li> 
                        <li class="nav-item"> 
                            <a class="nav-link text-white mx-3 hover-effect rounded-pill text-center fw-bold" href="/news">News</a> 
                        </li> 
                        <li class="nav-item"> 
                            <a class="nav-link text-white mx-3 hover-effect rounded-pill text-center fw-bold" href="/ocean">Search Map</a> 
                        </li> 
                    </ul> 
                </div>

                <!-- Dropdown untuk desktop -->
                <ul class="navbar-nav d-lg-flex d-md-flex d-none">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Guest</a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="/login" class="dropdown-item fw-bold">Login</a>
                            <a href="/regist" class="dropdown-item fw-bold">Register</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    @yield('content')

    <footer class="footer bg-dark text-white py-4">
        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="/" class="navbar-brand logo d-flex align-items-center text-white">
                        <h3><span class="sitename">DeepIntoOcean</span></h3>
                    </a>
                    <div class="footer-contact pt-3">
                        <h4>Contact</h4>
                        <p>Kebon Jeruk Raya Street No. 27</p>
                        <p>West Jakarta 11530, Indonesia</p>
                        <p><strong><span>Email: deepintoocean@gmail.com</span></strong></p>
                        <p class="mt-3"><strong><span>Phone: (+62)87718271118</span></strong></p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Features</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="/">Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="/about-us">About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="/termsandcondition">Terms and condition</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="/ocean">Search Map</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="/news">News</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="/donate">Donation</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6" style="padding: 10px;">
                    <h4>Follow Us</h4>
                    <div class="social-links d-flex">
                        <a href="www.facebook.com"><i class="bi bi-facebook"></i></a>
                        <a href="www.instagram.com"><i class="bi bi-instagram"></i></a>
                        <a href="www.linkedin.com"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>&copy; <span>Copyright</span> <strong class="px-1 sitename"> DeepIntoOcean</strong> <span>All Rights Reserved</span></p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>

</html>
