<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>This is a WebPage using Bootstrap 5</title>
    <!-- Import Boostrap css, js, font awesome here -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Slick -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <!-- Animis -->
    <link href="<?= _WEB_ROOT; ?>/public/assets/client/css/style.css" rel="stylesheet">
    <link href="<?= _WEB_ROOT; ?>/public/assets/client/#css/shopping-cart.css" rel="stylesheet">


</head>

<body>
    <div class="custom-shape-divider-top-1694698675">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="shape-fill"></path>
        </svg>
    </div>
    <!-- Navigation -->
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?= _WEB_ROOT; ?>/public/assets/client/images/logo.png" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav my-navigation mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Connect</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav social-icons flex-row">
                        <li class="nav-item">
                        <li class="nav-item">
                            <a href="#!" class="nav-link">
                                <i class="fab fa-instagram fa-lg"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">
                                <i class="fab fa-twitter fa-lg"></i>
                            </a>
                        </li>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">
                                <i class="fab fa-github fa-lg"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#!" class="nav-link">
                                <i class="fab fa-youtube fa-lg"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= _WEB_ROOT . 'home/logout'; ?>" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Đăng Xuất</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>