<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Red Ronin</title>


    <link href="{{URL::to('/')}}/css/mdb.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{URL::to('/')}}/css/header.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com.c26cd2166c.js"></script>
    <script src="{{URL::to('/')}}/js/codepen.js"></script>
    <link rel="stylesheet" href="{{URL::to('/')}}/css/footer.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>

<body style="background-size:cover;background-color:rgb(41, 39, 39);">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid" style="background:#151414">
            <a class="navbar-brand " href="#" style="font-family:'Pacifico', cursive;">
            </a>
            <a class="navbar-brand align-text-center" href="#" style="font-family:'Pacifico', cursive;">
                <img src="{{ URL::to('/') }}/Images/logo1.png" alt="Logo" width="70px" height="45px"
                    class="d-inline-block align-text-center rounded">
                <div class='webname' style="color: red;"> Red ronin</div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/') }}/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ URL::to('/') }}/manga">Manga</a>
                    </li>
                    <li class="nav-item dropdown">
                        {{-- <a class="nav-link dropdown-toggle" href="{{ URL::to('/') }}/search_products" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Products <i class="fa fa-arrow"></i>
                </a> --}}

                        <a class="nav-link dropdown-toggle" href="{{ URL::to('/') }}/search_products" role="button">
                            Products <i class="fa fa-arrow"></i>
                        </a>
                        {{-- <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ URL::to('/') }}/">Clothes</a></li>
                  <li><a class="dropdown-item" href="{{ URL::to('/') }}/">Figures</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="{{ URL::to('/') }}/">Case</a></li>
                </ul> --}}
                    </li>

                    <li class="nav-item">
                <a class="nav-link" href="{{ URL::to('/') }}/about_us">About Us</a>
              </li>
                </ul>
                <form class="d-flex" role="search">
                    {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                    {{-- <button class="btn btn-outline" type="submit">Search</button> --}}
                </form>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ URL::to('/') }}/cart">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <style>
                                    svg {
                                        fill: #f7f7f8
                                    }
                                </style>
                                <path
                                    d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z" />
                            </svg>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ URL::to('/') }}/user_profile">Profile</a></li>
                            {{-- <li><a class="dropdown-item" href="#">My orders</a></li> --}}
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>@if (Session::has('email'))
                                <a class="dropdown-item" href="{{ URL::to('/') }}/logout">Logout</a></li>

                            @else
                            <a class="dropdown-item" href="{{ URL::to('/') }}/login">Login</a></li>

                            @endif
                        </ul>
                    </li>

                </ul>


            </div>

        </div>
    </nav>



    @yield('content')



    <footer class="footer-section">
        <div class="container-fluid">
            <div class="footer-cta pt-4 pb-4">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>Rk University, Tramba, Rajkot</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>8160331232</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail us</h4>
                                <span>Redronin@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-3 pb-3">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href=""><img src="{{ URL::to('/') }}/Images/logo.png" class="img-fluid" alt="logo"></a>
                            </div>
                            <div class="footer-text">
                                <p>We are an anime Merchandise selling store and we are also providing mangas of many
                                    renowned writers </p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="#"><i class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="#"><i class="fab fa-twitter twitter-bg"></i></a>
                                <a href="#"><i class="fab fa-google-plus-g google-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="{{ URL::to('/') }}/home">Home</a></li>
                                <li><a href="{{ URL::to('/') }}/about_us">About us</a></li>
                                <li><a href="{{ URL::to('/') }}/search_product">search</a></li>
                                <li><a href="{{ URL::to('/') }}/cart">Cart</a></li>
                                <li><a href="{{ URL::to('/') }}/manga">Manga</a></li>
                                <li><a href="{{ URL::to('/') }}/register">Register</a></li>
                                <li><a href="{{ URL::to('/') }}/login">Login</a></li>
                                <li><a href="{{ URL::to('/') }}/admin_dashboard">Admin</a></li>
                                {{-- <li><a href="#">Contact us</a></li>
                                <li><a href="#">Latest News</a></li>  --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>Don’t miss to subscribe to our new feeds, kindly fill the form below.</p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address">
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-center">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2018, All Right Reserved <a href="">Harmish</a></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

</body>


{{-- <script src="https://kit.fontawesome.com.c26cd2166c.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>
