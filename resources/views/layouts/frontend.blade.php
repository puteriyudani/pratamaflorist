<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-hexashop.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css') }}">

    @yield('style')

    <style>
        .map-responsive {
            overflow: hidden;
            border-radius: 10px;
            margin-top: 20px;
        }

        .map-responsive iframe {
            width: 100%;
            height: 220px;
        }

        .floating-wa {
            position: fixed;
            right: 25px;
            bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 14px 20px;
            border-radius: 50px;
            background: #25D366;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 8px 20px rgba(0, 0, 0, .25);
            z-index: 9999;
            transition: all .3s ease;
            animation: waPulse 2s infinite;
        }

        .floating-wa i {
            font-size: 30px;
        }

        .floating-wa:hover {
            background: #1ebe5d;
            color: #fff;
            transform: translateY(-3px);
        }

        @keyframes waPulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, .6);
            }

            70% {
                box-shadow: 0 0 0 18px rgba(37, 211, 102, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0);
            }
        }

        @media (max-width:768px) {
            .floating-wa {
                right: 18px;
                bottom: 18px;
                width: 60px;
                height: 60px;
                padding: 0;
                justify-content: center;
                border-radius: 50%;
            }

            .floating-wa span {
                display: none;
            }

            .floating-wa i {
                font-size: 32px;
            }
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    @yield('header')
    <!-- ***** Header Area End ***** -->

    @yield('content')

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-lg-6 text-center">

                    <div class="logo mb-4">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo">
                    </div>

                    <p class="mb-3" style="color: white;">
                        <i class="fa fa-map-marker"></i>
                        Jl. Senggoro, Gg. Anugrah, ST/RW.004/004, Senggoro, Bengkalis
                    </p>

                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1994.2382394012652!2d102.14064936799058!3d1.4860172775940395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1783414099946!5m2!1sen!2sid"
                            width="100%" height="220" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>

                </div>

                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>
                            © {{ date('Y') }} Pratama Florist Bengkalis. All Rights Reserved.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->

    <a href="https://wa.me/6285386170847" class="floating-wa" target="_blank">

        <i class="fa fa-whatsapp"></i>
        <span>Chat Kami</span>
    </a>

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-2.1.0.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
    <script src="{{ asset('assets/js/accordions.js') }}"></script>
    <script src="{{ asset('assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/imgfix.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick.js') }}"></script>
    <script src="{{ asset('assets/js/lightbox.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>

    <!-- Global Init -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>

    <script>
        $('.owl-men-item').owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });
    </script>

</body>

</html>
