<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{config('app.name')}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('images/'.config('app.logo'))}}">
    <!-- bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap.min.css')}}" type="text/css" media="all">
    <!-- carousel CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.carousel.min.css')}}" type="text/css" media="all">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/animate.css')}}" type="text/css" media="all">
    <!-- animated-text CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/animated-text.css')}}" type="text/css" media="all">
    <!-- font-awesome CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/all.min.css')}}" type="text/css" media="all">
    <!-- theme-default CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/theme-default.css')}}" type="text/css" media="all">
    <!-- meanmenu CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/meanmenu.min.css')}}" type="text/css" media="all">
    <!-- transitions CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/owl.transitions.css')}}" type="text/css" media="all">
    <!-- venobox CSS -->
    <link rel="stylesheet" href="{{asset('front/venobox/venobox.css')}}" type="text/css" media="all">
    <!-- flaticon -->
    <link rel="stylesheet" href="{{asset('front/assets/css/bootstrap-icons.css')}}" type="text/css" media="all">
    <!-- bootstrap icons -->
    <link rel="stylesheet" href="{{asset('front/assets/css/flaticon.css')}}" type="text/css" media="all">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/style.css')}}" type="text/css" media="all">
    <!-- responsive CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/responsive.css')}}" type="text/css" media="all">
    <!-- Coustom Animation CSS -->
    <link rel="stylesheet" href="{{asset('front/assets/css/coustom-animation.css')}}" type="text/css" media="all">
    <link rel="stylesheet" href="{{asset('front/assets/css/swiper-bundle.css')}}" type="text/css" media="all">
    <!-- odometer CSS -->   
    <link rel="stylesheet" href="{{asset('front/assets/css/odometer-theme-default.css')}}" type="text/css" media="all">    
    <link rel="stylesheet" href="{{asset('front/assets/css/scroll-up.css')}}" type="text/css" media="all">     

    <!-- modernizr js -->
    <script src="{{asset('front/assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <style>
        .mean-container .mean-bar::before {
            color: #fff;
            content: "{{config('app.name')}}";
            font-size: 28px;
            font-weight: 600;
            left: 10px;
            position: absolute;
            top: 18px;
        }
    </style>
</head>

<body>

    <!--========= Prealoader ==============-->
    <div class="loading-screen" id="loading-screen">
        <span class="bar top-bar"></span>
        <span class="bar down-bar"></span>
        <div class="animation-preloader">
            <div class="spinner"></div>
            <div class="txt-loading">
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="G" class="letters-loading">G</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="T" class="letters-loading">T</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader=" " class="letters-loading"> </span>
                <span data-text-preloader="G" class="letters-loading">G</span>
                <span data-text-preloader="B" class="letters-loading">B</span>
                <span data-text-preloader="U" class="letters-loading">U</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="I" class="letters-loading">I</span>
                <span data-text-preloader="N" class="letters-loading">N</span>
                <span data-text-preloader="E" class="letters-loading">E</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
                <span data-text-preloader="S" class="letters-loading">S</span>
            </div>
        </div>
    </div>
    <!--========= End Prealoader ==============-->


<!--==================================================-->
<!-- Start Consalt Header Area Style Sixs-->
<!--==================================================-->
<div class="consalt-header-area style_two style_three style_sixs" id="sticky-header" >
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="header-logo">
                    <a class="active_header" href="{{url('/')}}"><img src="{{asset('images/'.config('app.logo'))}}" width="90" alt="logo"></a>
                    <a class="active_sticky" href="{{url('/')}}"><img src="{{asset('images/'.config('app.dark_logo'))}}" width="90" alt="logo"></a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="header-menu">
                    <ul class="nav_scroll">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('about-us')}}">About</a></li>
                        <li><a href="javascript:void(0)">Blog <span><i class="fas fa-angle-down"></i></span></a>
                            <ul class="sub_menu">
                                <li><a href="javascript:void(0)">Blog</a></li>
                                <li><a href="javascript:void(0)">Blog Details</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('contact-us')}}">Contact</a></li>
                    </ul>
                    
                </div>
            </div>
            <div class="col-lg-3">  
                <div class="consalt_header-right">
                    <div class="header-search-button search-box-outer">
                        <a href="javascript:void();"><i class="fas fa-search"></i></a>
                    </div>  
                    <div class="sidebar-btn">
                        <div class="nav-btn navSidebar-button"><span><i class="bi bi-filter-left"></i></span></div>                         
                    </div>      
                    <div class="header-button style_two">
                        @auth
                        <a href="{{url('dashboard')}}">Dashboard</a>
                        @else
                        <a href="{{url('login')}}">Login</a>
                        @endauth
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!--==================================================-->
<!-- End Consalt Header Area -->
<!--==================================================-->

<!--========= Start Mobile Memu========== -->

<div class="mobile-menu-area sticky d-sm-block d-md-block d-lg-none">
    <div class="mobile-menu">
        <nav class="header-menu">
            <ul class="nav_scroll">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('about-us')}}">About</a></li>
                <li><a href="javascript:void(0)">Blog</a>
                    <ul class="sub_menu">
                        <li><a href="javascript:void(0)">Blog</a></li>
                        <li><a href="javascript:void(0)">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="{{url('contact-us')}}">Contact</a></li>
                @auth
                <li><a href="{{url('dashboard')}}" class="text-primary ">Dashboard</a></li>
                @else
                <li><a href="{{url('login')}}" class="text-primary ">Login</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</div>
<!--========= End Mobile Memu========== -->

<!-- Sidebar Cart Item -->
<div class="xs-sidebar-group info-group">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget">
                    <i class="far fa-times-circle"></i>
                </a>
            </div>
            <div class="sidebar-textwidget">
                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="nav-logo">
                            <a href="{{url('/')}}"><img src="{{asset('images/'.config('app.logo'))}}" width="90" alt="sid img" ></a>
                        </div>
                        <div class="row padding-two">
                            <div class="col-lg-6">
                                <div class="content-thumb-box">
                                    <img src="{{asset('front/assets/images/home-six/team.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="content-thumb-box">
                                    <img src="{{asset('front/assets/images/home-six/team1.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="content-thumb-box">
                                    <img src="{{asset('front/assets/images/home-six/team2.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="content-thumb-box">
                                    <img src="{{asset('front/assets/images/home-six/team.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="contact-info">
                            <h2>Contact Info</h2>
                            <ul class="list-style-one">
                                <li><i class="bi bi-envelope"></i>Chicago 12, Melborne City, USA</li>
                                <li><i class="bi bi-envelope"></i>(+001) 123-456-7890</li>
                                <li><i class="bi bi-envelope"></i>Example.com</li>
                                <li><i class="bi bi-envelope"></i>Week Days: 09.00 to 18.00 Sunday: Closed</li>
                            </ul>
                        </div>
                        <!-- Social Box -->
                        <ul class="social-box">
                            <li class="facebook"><a href="#" class="fab fa-facebook-f"></a></li>
                            <li class="twitter"><a href="#" class="fab fa-instagram"></a></li>
                            <li class="linkedin"><a href="#" class="fab fa-twitter"></a></li>
                            <li class="instagram"><a href="#" class="fab fa-pinterest-p"></a></li>
                            <li class="youtube"><a href="#" class="fab fa-linkedin-in"></a></li>
                        </ul>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</div>
            
@yield('content')

<!--==================================================-->
<!-- Start Consalt Footer Area Style Five -->
<!--==================================================-->
<section class="footer_area style_sixs boxed">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer_logo">
                    <a href="{{url('/')}}"><img src="{{asset('images/'.config('app.dark_logo'))}}" width="100" alt=""></a>
                </div>
                <p class="footer_desc">Continually plagiarize virtual web service pro with home_one maximizing action</p>
                <form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form">
                    <div class="subscribe_form">
                        <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="Your E-Mail">
                        <button type="submit" class="btn">Subscribe</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Company</h4>
                    </div>
                    <div class="footer-widget-menu">
                        <ul>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> About Us</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Meet the Team</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Integrations</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Contact Us</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Blog</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6">
                <div class="footer-widget-content">
                    <div class="footer-widget-title">
                        <h4>Service</h4>
                    </div>
                    <div class="footer-widget-menu">
                        <ul>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Consultant</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Web Development</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> UI Design</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Networking</a></li>
                            <li><a href="#"><i class="bi bi-chevron-double-right"></i> Search Engine</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-widget-contact">
                    <div class="footer-widget-title">
                        <h4>Contact</h4>
                    </div>
                    <!-- footer widget address -->
                    <div class="footer-widget-address style_two">
                        <div class="footer_widget_icon style_upper">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div class="footer-widget-address_text">
                            <p>Our address:</p>
                            <span>Old Westbury 256, New York 11201,
                                United States</span>
                        </div>
                    </div>
                    <!-- footer widget address -->
                    <div class="footer-widget-address">
                        <div class="footer_widget_icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="footer-widget-address_text">
                            <p>+880 123 (4567) 890</p>
                        </div>
                    </div>
                    <!-- footer widget address -->
                    <div class="footer-widget-address">
                        <div class="footer_widget_icon">
                            <i class="bi bi-envelope-open"></i>
                        </div>
                        <div class="footer-widget-address_text">
                            <p>example@gmail.com</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
        <div class="row add-border align-items-center">
            <div class="col-md-7">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-content-copy">
                        <p>Copyright 2025 <a class="text-white" href="{{url('/')}}">{{config('app.name')}}</a> | Developed by Team <a class="text-white" href="https://webazu.in"> Webazu Technology OPC Private Limited</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 text-right">
                <div class="footer-bottom-content">
                    <div class="footer-bottom-menu">
                        <ul>
                            <li><a href="#">FACEBOOK</a></li>
                            <li><a href="#">TWITTER</a></li>
                            <li><a href="#">INSTAGRAM</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--==================================================-->
<!-- End Consalt Footer Area Style Five-->
<!--==================================================-->


<!--==================================================-->
<!-- Start Search Popup Section -->
<!--==================================================-->
<div class="search-popup">
    <button class="close-search style-two"><span class="flaticon-multiply"><i class="far fa-times-circle"></i></span></button>
    <button class="close-search"><i class="bi bi-arrow-up"></i></button>
    <form method="post" action="#">
        <div class="form-group">
            <input type="search" name="search-field" value="" placeholder="Search Here" required="">
            <button type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
</div>
<!--==================================================-->
<!-- Start Search Popup Section -->
<!--==================================================-->


<!--==================================================-->
<!-- Start Consalt Scroll Up-->
<!--==================================================-->
<div class="prgoress_indicator active-progress">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 212.78;"></path>
    </svg>
 </div>
<!--==================================================-->
<!-- End Consalt Scroll Up-->
<!--==================================================-->
    
    <!-- jquery js -->
    <script src="{{asset('front/assets/js/vendor/jquery-3.6.2.min.js')}}"></script>
    <script src="{{asset('front/assets/js/popper.min.js')}}"></script>
    <!-- bootstrap js -->
    <script src="{{asset('front/assets/js/bootstrap.min.js')}}"></script>
    <!-- carousel js -->
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <!-- counterup js -->
    <script src="{{asset('front/assets/js/jquery.counterup.min.js')}}"></script>
    <!-- waypoints js -->
    <script src="{{asset('front/assets/js/waypoints.min.js')}}"></script>
    <!-- wow js -->
    <script src="{{asset('front/assets/js/wow.js')}}"></script>
    <!-- imagesloaded js -->
    <script src="{{asset('front/assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- venobox js -->
    <script src="{{asset('front/venobox/venobox.js')}}"></script>
    <!--  animated-text js -->
    <script src="{{asset('front/assets/js/animated-text.js')}}"></script>
    <!-- venobox min js -->
    <script src="{{asset('front/venobox/venobox.min.js')}}"></script>
    <!-- isotope js -->
    <script src="{{asset('front/assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- jquery meanmenu js -->
    <script src="{{asset('front/assets/js/jquery.meanmenu.js')}}"></script>
    <!-- jquery scrollup js -->
    <script src="{{asset('front/assets/js/jquery.scrollUp.js')}}"></script>
    <!-- theme js -->
    <script src="{{asset('front/assets/js/theme.js')}}"></script>
    <!-- barfiller -->
    <script src="{{asset('front/assets/js/jquery.barfiller.js')}}"></script>
    <script src="{{asset('front/assets/js/swiper-bundle.js')}}"></script>
    <script src="{{asset('front/assets/js/magnific-popup-js.html')}}"></script>
    <script src="{{asset('front/assets/js/custom.js')}}"></script>

</body>
</html>