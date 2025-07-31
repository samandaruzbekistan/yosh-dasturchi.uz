<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="../img/favicon.png" type="image/png"/>
    <title>Yosh dasturchi</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <link rel="stylesheet" href="../css/flaticon.css"/>
    <link rel="stylesheet" href="../css/audio.css"/>
    <link rel="stylesheet" href="../css/themify-icons.css"/>
    <link rel="stylesheet" href="../css/fontawesome.css"/>
    <link rel="stylesheet" href="../css/owl-carousel/owl.carousel.min.css"/>
    <link rel="stylesheet" href="../css/nice-select/css/nice-select.css"/>
    <!-- main css -->
    <link rel="stylesheet" href="../css/style.css"/>

    @yield('css')
</head>

<body>
<!--================ Start Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" method="" action="">
                    <input
                        type="text"
                        class="form-control"
                        id="search_input"
                        placeholder="Search Here"
                    />
                    <button type="submit" class="btn"></button>
                    <span
                        class="ti-close"
                        id="close_search"
                        title="Close Search"
                    ></span>
                </form>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="/"
                ><img src="../img/logo.png" alt="" width="100px"
                    /></a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div
                    class="collapse navbar-collapse offset"
                    id="navbarSupportedContent"
                >
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item @yield('index')">
                            <a class="nav-link" href="{{ route('user.index') }}">Bosh sahifa</a>
                        </li>
                        <li class="nav-item @yield('sections')">
                            <a class="nav-link" href="{{ asset('/') }}#sections">Bo'limlar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#author">Muallif</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Bog'lanish</a>
                        </li>
                        @if(session()->has('user_id'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-bitbucket" href="{{ route('user.profile') }}">{{ session('user_name') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link btn btn-bitbucket" href="{{ route('user.logout') }}">Chiqish</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link btn btn-bitbucket" href="{{ route('user.login') }}">Kirish</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a href="#" class="nav-link search" id="search">
                                <i class="ti-search"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================ End Header Menu Area =================-->


@yield('main')



<!--================ Start footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Qisimlar</h4>
                <ul>
                    <li><a href="#">I qisim</a></li>
                    <li><a href="#">II qisim</a></li>
                    <li><a href="#">III qisim</a></li>
                    <li><a href="#">IV qisim</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 single-footer-widget">
                <h4>Bo'limlar</h4>
                <ul>
                    <li><a href="#">Bosh sahifa</a></li>
                    <li><a href="#">Bo'limlar</a></li>
                    <li><a href="#">Muallif</a></li>
                    <li><a href="#">Sayt haqida</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>Xabar berish</h4>
                <p>Saytda kamchilik va xatoliklar topsangiz bizga xabar bering</p>
                <div class="form-wrap" id="mc_embed_signup">
                    <form
                        target="_blank"
                        method="get"
                        class="form-inline"
                    >
                        <input
                            class="form-control"
                            name="Xabar"
                            placeholder="Xabar"
                            onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Your Email Address'"
                            required=""
                            type="text"
                        />
                        <button class="click-btn btn btn-default">
                            <span>subscribe</span>
                        </button>


                        <div class="info"></div>
                    </form>
                </div>
            </div>

        </div>
        <div class="row footer-bottom">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                Barcha huquqlar himoyalangan | Ishlab chiquvchi: <a href="https://goldapps.uz" target="_blank">Gold Apps IT
                    company</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="#"><i class="ti-facebook"></i></a>
                <a href="#"><i class="ti-twitter"></i></a>
                <a href="#"><i class="ti-dribbble"></i></a>
                <a href="#"><i class="ti-linkedin"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@yield('js')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="../vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="../js/owl-carousel-thumb.min.js"></script>
<script src="../js/jquery.ajaxchimp.min.js"></script>
<script src="../js/mail-script.js"></script>
<!--gmaps Js-->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="../js/gmaps.min.js"></script>
<script src="../js/theme.js"></script>
</body>
</html>
