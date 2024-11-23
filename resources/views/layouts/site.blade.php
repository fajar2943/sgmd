<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-site-verification" content="AI89wT6clumVCSzYGaV0M7n1A21WkKs4NMFmQl2gUok" />
    <!-- SEO Meta Tags -->
    <meta name="description" content="internet murah bogor, internet murah bojong, internet stabil rnet, internet stabil rtiga, sgmd, star global media">
    <meta name="author" content="STAR GLOBAL MEDIA">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="STAR GLOBAL MEDIA" /> <!-- website name -->
    <meta property="og:site" content="https://sgmd.co.id/" /> <!-- website link -->
    <meta property="og:title" content="STAR GLOBAL MEDIA"/> <!-- title shown in the actual shared post -->
    <meta property="og:description" content="CV.STAR GLOBAL MEDIA merupakan bentuk layanan pengelolaan dalam bidang IT (informasi dan teknologi) secara menyeluruh. Teknologi dari layanan Kami ini meliputi Internet Connection, IT Infrastructure, Integrated System, CCTV dan Professional Service." /> <!-- description shown in the actual shared post -->
    <meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>@yield('title')</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,600,700,700i&amp;subset=latin-ext" rel="stylesheet">
    <link href="{{asset('sgmd/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('sgmd/css/fontawesome-all.css')}}" rel="stylesheet">
    <link href="{{asset('sgmd/css/swiper.css')}}" rel="stylesheet">
    <link href="{{asset('sgmd/css/magnific-popup.css')}}" rel="stylesheet">
    <link href="{{asset('sgmd/css/styles.css')}}" rel="stylesheet">

    @yield('head')
    
    <!-- Favicon  -->
    <link rel="icon" href="{{asset('sgmd/images/favicon.png')}}">
    
    <style>
    .fixed-whatsapp {
    position: fixed;
    bottom: 20px;
    left: 60px;
    width: 50px;
    height: 50px;
    line-height: 50px;
    z-index: 9999;
    text-align: center;
    }

    .fixed-whatsapp:before {
    content: "";
    width: 50px;
    height: 50px;
    background-color: #00C853;
    position: absolute;
    border-radius: 100%;
    box-shadow: 0 1px 1.5px 0 rgba(0, 0, 0, .12), 0 1px 1px 0 rgba(0, 0, 0, .24);
    z-index: 1;
    top: 0;
    left: 0;
    }

    .fixed-whatsapp svg {
    vertical-align: middle;
    z-index: 2;
    position: relative;
    }
    .fixed-whatsapp:after {
    content: "Hai...kakak, chat mimin di sini yah!";
    width: 100px;
    padding: 10px 10px;
    position: absolute;
    bottom: 100%;
    margin-bottom: 10px;
    right: -150px;
    text-align: left;
    color: #555;
    border: 1px solid #dedede;
    background: rgba(255,255,255,.5);
    border-radius: 4px;
    opacity: 0;
    transition:all .4s ease-in-out;
    font-size: 90%;
    line-height: 1.1;
    }
    .fixed-whatsapp:hover:after {
    opacity: 1;
    right: 0;
    }
    </style>    
</head>
<body data-spy="scroll" data-target=".fixed-top">
<div class="fixed-whatsapp">
<a href="https://api.whatsapp.com/send?phone=6281910203045&text=Halo%20Kak,%20Perkenalkan%0ANama%20Saya%20=%20%0AAlamat%20=%20%0AKeperluan%20=%20" target="_blank"><svg viewBox='0 0 24 24' width='34' height='34'><path fill='#ffffff' d='M16.75,13.96C17,14.09 17.16,14.16 17.21,14.26C17.27,14.37 17.25,14.87 17,15.44C16.8,16 15.76,16.54 15.3,16.56C14.84,16.58 14.83,16.92 12.34,15.83C9.85,14.74 8.35,12.08 8.23,11.91C8.11,11.74 7.27,10.53 7.31,9.3C7.36,8.08 8,7.5 8.26,7.26C8.5,7 8.77,6.97 8.94,7H9.41C9.56,7 9.77,6.94 9.96,7.45L10.65,9.32C10.71,9.45 10.75,9.6 10.66,9.76L10.39,10.17L10,10.59C9.88,10.71 9.74,10.84 9.88,11.09C10,11.35 10.5,12.18 11.2,12.87C12.11,13.75 12.91,14.04 13.15,14.17C13.39,14.31 13.54,14.29 13.69,14.13L14.5,13.19C14.69,12.94 14.85,13 15.08,13.08L16.75,13.96M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C10.03,22 8.2,21.43 6.65,20.45L2,22L3.55,17.35C2.57,15.8 2,13.97 2,12A10,10 0 0,1 12,2M12,4A8,8 0 0,0 4,12C4,13.72 4.54,15.31 5.46,16.61L4.5,19.5L7.39,18.54C8.69,19.46 10.28,20 12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4Z'/></svg>
</div></a>
    
    @if (!Session::get('Failed'))
        <!-- Preloader -->
        <div class="spinner-wrapper">
            <div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
        <!-- end of preloader -->        
    @endif
    

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Evolo</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="/"><img src="{{asset('sgmd/images/LOGO.png')}}" alt="alternative"></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                </li>
            <!-- Dropdown Menu -->          
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" href="#!" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">Paket</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/#pricing"><span class="item-text">Paket Broadband</span></a>
                        <div class="dropdown-items-divide-hr"></div>
                        <a class="dropdown-item" href="/voucher"><span class="item-text">Voucher Internet</span></a>
                    </div>
                </li>
            <!-- end of dropdown menu -->
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#about">Team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Contact</a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link page-scroll" href="#">Live Cctv</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="https://starglobal.id">Member Area</a>
                </li>
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    @yield('header')
    
    
    @yield('content')



    @yield('detail')


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a href="https://sgmd.co.id/">STAR GLOBAL MEDIA</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
        
    <!-- Scripts -->
    <script src="{{asset('sgmd/js/jquery.min.js')}}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{asset('sgmd/js/popper.min.js')}}"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="{{asset('sgmd/js/bootstrap.min.js')}}"></script> <!-- Bootstrap framework -->
    <script src="{{asset('sgmd/js/jquery.easing.min.js')}}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{asset('sgmd/js/swiper.min.js')}}"></script> <!-- Swiper for image and text sliders -->
    <script src="{{asset('sgmd/js/jquery.magnific-popup.js')}}"></script> <!-- Magnific Popup for lightboxes -->
    <script src="{{asset('sgmd/js/validator.min.js')}}"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="{{asset('sgmd/js/scripts.js')}}"></script> <!-- Custom scripts -->

    @yield('js')
</body>
</html>