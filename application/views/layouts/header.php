<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $this->title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="../../../assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../../../assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../../../assets/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../../../assets/css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="../../../assets/css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../../../assets/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../../../assets/css/aos.css">

    <link rel="stylesheet" href="../../../assets/css/style.css">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="border-bottom top-bar py-2 bg-dark" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">
                        <span class="mr-3"><strong class="text-white">Phone:</strong> <a href="tel://#">+1 234 5678 9101</a></span>
                        <span><strong class="text-white">Email:</strong> <a href="#">info@yourdomain.com</a></span>
                    </p>
                </div>
                <div class="col-md-6">
                    <ul class="social-media">
                        <li><a href="#" class="p-2"><span class="icon-facebook"></span></a></li>
                        <li><a href="#" class="p-2"><span class="icon-twitter"></span></a></li>
                        <li><a href="#" class="p-2"><span class="icon-instagram"></span></a></li>
                        <li><a href="#" class="p-2"><span class="icon-linkedin"></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="/" class="text-black h2 mb-0">Create<span class="text-primary">.</span> </a></h1>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="/" class="nav-link">Home</a></li>
                            <li><a href="" class="nav-link">Work</a></li>
                            <li>
                                <a href="" class="nav-link">Services</a>
                            </li>
                            <li>
                                <a href="" class="nav-link">Contact</a>
                            </li>
                            <?php if(\application\components\Auth::isGuest()): ?>
                            <li>
                                <a style="color: #32dbc6; font-weight: bold" href="/account/login/" class="nav-link">Sign in / Sign up</a>
                            </li>
                            <?php else: ?>
                            <li>
                                <a style="color: #32dbc6; font-weight: bold" href="/cabinet/"><i class="fa fa-user"></i> Account</a>
                            </li>
                            <li>
                                <a style="color: #32dbc6; font-weight: bold" href="/account/logout/"><i class="fa fa-unlock"></i> Log out</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                </div>

                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

            </div>
        </div>

    </header>