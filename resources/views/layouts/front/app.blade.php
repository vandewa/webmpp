<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="MPP Wonosobo">

    <!-- ========== Page Title ========== -->
    <title>MPP Kab. Wonosobo</title>

    <!-- ========== Favicon Icon ========== -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- ========== Start Stylesheet ========== -->
    <link href="{{ asset('gostart/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/themify-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/flaticon-set.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/magnific-popup.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/owl.carousel.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/owl.theme.default.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/animate.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/assets/css/bootsnav.css') }}" rel="stylesheet" />
    <link href="{{ asset('gostart/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gostart/assets/css/responsive.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/zilom.css') }}">

    <!-- ========== End Stylesheet ========== -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5/html5shiv.min.js"></script>
      <script src="assets/js/html5/respond.min.js"></script>
    <![endif]-->

    <!-- ========== Google Fonts ========== -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">

    @vite([])

    @stack('css')

</head>

<body>

    <!-- Preloader Start -->
    <div class="se-pre-con"></div>
    <!-- Preloader Ends -->

    <!-- Header
    ============================================= -->
    <header id="home">

        <!-- Start Navigation -->
        <nav class="navbar navbar-default active-border navbar-fixed navbar-transparent black bootsnav">

            <div class="container">

                <!-- Start Atribute Navigation -->
                {{-- <div class="attr-nav button fixed-nav">
                    <ul>
                        <li>
                            <a href="#">Login</a>
                        </li>
                        <li>
                            <a href="#">Sign Up</a>
                        </li>
                    </ul>
                </div> --}}
                <!-- End Atribute Navigation -->

                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                        <i class="fa fa-bars"></i>
                    </button>
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <img src="{{ asset('mpp.png') }}" class="logo logo-display" alt="Logo"
                            style="width: 100px;">
                        <img src="{{ asset('mpp.png') }}" class="logo logo-scrolled" alt="Logo"
                            style="width: 100px;">
                    </a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                        <li>
                            <a class="smooth-menu" href="#dashboard">Beranda</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#berita">Berita</a>
                        </li>
                        <li>
                            <a class="smooth-menu" href="#aplikasi">Daftar Aplikasi</a>
                        </li>

                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
        <!-- End Navigation -->

    </header>
    <!-- End Header -->

    @yield('content')

    <!-- Start Footer
    ============================================= -->
    <footer class="bg-gray" style="background-color: #afe5d0">
        <div class="svg-shape">
            <svg xmlns="http://www.w3.org/2000/svg" class="light" preserveAspectRatio="none" viewBox="0 0 1070 52">
                <path d="M0,0S247,91,505,32c261.17-59.72,565-13,565-13V0Z"></path>
            </svg>
        </div>
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="col-md-6 col-sm-6 equal-height item">
                            <div class="f-item about">
                                <h4>Kontak</h4>
                                {{-- <img src="{{ asset('gostart/assets/img/logo.png') }}" alt="Logo"> --}}
                                <ul class="nav nav-sm nav-x-0 nav-white flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link media">
                                            <i class="fa-solid fa-building-columns"></i> &nbsp;
                                            <span style="font-size:14px;"> {{ $info->alamat ?? '' }}
                                            </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link media" href="tel:{{ $info->telepon ?? '' }}">
                                            <i class="fa-solid fa-phone-volume"></i> &nbsp;
                                            <span style="font-size:14px;"> {{ $info->telepon ?? '' }}
                                            </span>

                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link media" href="mailto:{{ $info->email ?? '' }}">
                                            <i class="fa-solid fa-envelope"></i> &nbsp; <span style="font-size:14px;">
                                                {{ $info->email ?? '' }}
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 equal-height item text-right">
                            <div class="f-item link">
                                <li class="nav-item">
                                    {!! $info->maps ?? '' !!}
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <span style="font-size: 15px;color:black;">&copy;
                    Copyright
                    @if (date('Y') == 2023)
                        2023
                    @else
                        2023 - {{ date('Y') }}
                    @endif
                    . Mal Pelayanan Publik Kabupaten Wonosobo. All
                    Rights Reserved
                </span>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ asset('gostart/assets/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/equal-height.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/modernizr.custom.13711.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/progress-bar.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/count-to.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/YTPlayer.min.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/circle-progress.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/bootsnav.js') }}"></script>
    <script src="{{ asset('gostart/assets/js/main.js') }}"></script>
    <script src="https://kit.fontawesome.com/bb9305debb.js" crossorigin="anonymous"></script>

    @stack('js')
</body>

</html>
