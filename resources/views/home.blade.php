@extends('layouts.frontend')
@section('title', 'Pratama Florist Bengkalis')
@section('style')
    <style>
        .logo img {
            width: 100px;
        }

        /* ===========================
                                                   BODY
                                                =========================== */

        body {
            position: relative;
            isolation: isolate;
            background:
                radial-gradient(circle at 10% 15%, rgba(255, 192, 203, .18) 0 140px, transparent 141px),
                radial-gradient(circle at 90% 10%, rgba(255, 228, 196, .20) 0 180px, transparent 181px),
                radial-gradient(circle at 85% 85%, rgba(255, 182, 193, .15) 0 160px, transparent 161px),
                radial-gradient(circle at 15% 90%, rgba(255, 240, 200, .18) 0 180px, transparent 181px),
                linear-gradient(180deg, #fffdfd 0%, #fff8f6 45%, #fffdfb 100%);
            overflow-x: hidden;
        }

        /* ===========================
                                                    FLOWER DECORATION
                                                =========================== */

        body::before,
        body::after {
            content: "";
            position: fixed;
            top: 0;
            width: 220px;
            height: 100vh;
            pointer-events: none;
            z-index: 0;
            opacity: 1;
            background-repeat: repeat-y;
            background-size: 180px;
        }

        body::before {
            left: 0;
            background-image: url("{{ asset('assets/images/flower-left.png') }}");
            background-position: left top;
        }

        body::after {
            right: 0;
            background-image: url("{{ asset('assets/images/flower-right.png') }}");
            background-position: right top;
        }


        /* ===========================
                                                   NAVBAR
                                                =========================== */

        .header-area {
            background: rgba(255, 255, 255, .92);
            backdrop-filter: blur(10px);
            box-shadow: 0 5px 20px rgba(0, 0, 0, .06);
        }

        .main-nav .nav li a {
            transition: .3s;
        }

        .main-nav .nav li a:hover {
            color: #b68a60 !important;
        }


        /* ===========================
                                                   BANNER
                                                =========================== */

        .main-banner {
            width: 100%;
            overflow: hidden;
        }

        #bannerCarousel,
        #bannerCarousel .carousel-inner,
        #bannerCarousel .carousel-item {
            width: 100%;
        }

        #bannerCarousel .carousel-item {
            position: relative;
        }

        #bannerCarousel .carousel-item img {
            width: 100%;
            height: clamp(250px, 40vw, 700px);
            object-fit: cover;
            object-position: center;
        }

        /* ===========================
                                                   INDICATOR
                                                =========================== */

        .custom-indicator {
            justify-content: flex-end;
            margin-right: 40px;
            margin-bottom: 35px;
        }

        .custom-indicator button {
            width: 10px !important;
            height: 10px !important;
            border-radius: 50%;
            margin: 0 5px !important;
            background: #fff;
            opacity: .5;
        }

        .custom-indicator .active {
            opacity: 1;
        }


        /* ===========================
                                                   PRODUK
                                                =========================== */

        .product-section {
            padding: 50px 0;
        }

        .product-section:nth-child(even) {
            background: rgba(255, 255, 255, .55);
        }

        .section-heading h2 {
            font-size: 34px;
            font-weight: 700;
            color: #444;
            margin-bottom: 20px;
            text-align: center;
        }

        .owl-men-item .item {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            transition: .35s;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .05);
        }

        .owl-men-item .item:hover {
            transform: translateY(-8px);
            box-shadow: 0 18px 40px rgba(0, 0, 0, .12);
        }

        .owl-men-item .thumb {
            overflow: hidden;
        }

        .owl-men-item .thumb img {
            width: 100%;
            height: 380px;
            object-fit: cover;
            transition: .4s;
        }

        .owl-men-item .item:hover img {
            transform: scale(1.05);
        }

        .down-content {
            padding: 20px;
        }

        .down-content h4 {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .down-content span {
            color: #28a745;
            font-size: 20px;
            font-weight: 700;
        }


        /* ===========================
                                                   WA ICON
                                                =========================== */

        .hover-content ul li a {
            background: #25D366 !important;
            color: #fff !important;
        }

        .hover-content ul li a:hover {
            background: #1da851 !important;
        }


        /* ===========================
                    SOCIAL
            =========================== */

        #social {
            padding: 80px 0;
            background: rgba(255, 255, 255, .7);
        }

        .social-card {
            background: #fff;
            border-radius: 20px;
            padding: 35px;
            text-align: center;
            height: 100%;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            transition: .35s;
        }

        .social-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, .12);
        }

        .social-icon {
            width: 80px;
            height: 80px;
            margin: auto;
            border-radius: 50%;
            background: linear-gradient(135deg, #feda75, #fa7e1e, #d62976, #962fbf, #4f5bd5);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 34px;
            margin-bottom: 20px;
        }

        .social-card h4 {
            font-weight: 700;
            margin-bottom: 15px;
            color: #444;
        }

        .social-card p {
            color: #777;
            line-height: 1.8;
            min-height: 90px;
        }

        .social-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 12px 28px;
            border-radius: 50px;
            background: #E1306C;
            color: #fff;
            text-decoration: none;
            transition: .3s;
        }

        .social-btn:hover {
            background: #c13584;
            color: #fff;
            text-decoration: none;
        }

        .social-btn i {
            margin-right: 8px;
        }

        /* ===========================
                                                   FOOTER
                                                =========================== */

        footer {
            background: #36220b;
            border-top: 1px solid #eee;
        }


        /* ===========================
                                                   MOBILE
                                                =========================== */

        @media (max-width: 991px) {
            #bannerCarousel .carousel-item img {
                height: auto;
                object-fit: contain;
            }

            #bannerCarousel .carousel-item {
                background: #fff;
            }
        }

        @media(max-width:768px) {

            body::before,
            body::after {
                width: 90px;
                background-size: 80px;
                opacity: .08;
            }

            .main-banner {
                padding-top: 70px;
            }

            .banner-content {
                left: 25px;
                right: 25px;
                max-width: 100%;
            }

            .banner-content h1 {
                font-size: 32px;
            }

            .banner-content p {
                font-size: 15px;
            }

            #bannerCarousel .carousel-item img {
                width: 100%;
                height: auto;
                object-fit: contain;
            }

            .custom-indicator {
                margin-right: 15px;
                margin-bottom: 15px;
            }

            .owl-men-item .thumb img {
                height: 300px;
            }
        }
    </style>
@endsection
@section('header')
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="submenu">
                                <a href="#">Produk</a>

                                <ul>
                                    @foreach ($kategoris as $kategori)
                                        <li>
                                            <a href="#kategori-{{ $kategori->id }}">
                                                {{ $kategori->nama_kategori }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="#social">Kontak</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
@endsection
@section('content')
    <!-- ***** Main Banner Area Start ***** -->
    <div class="main-banner">

        <div id="bannerCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">

            <div class="carousel-inner">

                @forelse($banners as $banner)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">

                        <img src="{{ asset('storage/banner/' . $banner->image) }}" class="d-block w-100"
                            alt="Banner {{ $loop->iteration }}">

                    </div>

                @empty

                    <div class="carousel-item active">

                        <img src="https://placehold.co/1920x700?text=Belum+Ada+Banner" class="d-block w-100"
                            alt="No Banner">

                    </div>
                @endforelse

            </div>

            @if ($banners->count() > 1)

                <!-- Indicator -->

                <div class="carousel-indicators custom-indicator">

                    @foreach ($banners as $banner)
                        <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $loop->index }}"
                            class="{{ $loop->first ? 'active' : '' }}">
                        </button>
                    @endforeach

                </div>

            @endif

        </div>

    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Produk Starts ***** -->
    @foreach ($kategoris as $kategori)
        <section class="section product-section" id="kategori-{{ $kategori->id }}">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <h2>{{ $kategori->nama_kategori }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="men-item-carousel">
                            <div class="owl-men-item owl-carousel">
                                @forelse($kategori->products as $product)
                                    <div class="item">
                                        <div class="thumb">
                                            <div class="hover-content">
                                                <ul>
                                                    <li>
                                                        <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Admin, mau beli ' . $kategori->nama_kategori . ', ' . $product->nama_produk . '') }}"
                                                            target="_blank" title="Pesan via WhatsApp">
                                                            <i class="fa fa-whatsapp"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/images/' . $product->image) }}"
                                                    alt="{{ $product->nama_produk }}">
                                            @else
                                                <img src="https://placehold.co/370x500?text=No+Image">
                                            @endif
                                        </div>
                                        <div class="down-content">
                                            <h4>{{ $product->nama_produk }}</h4>
                                            <span>Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="item">
                                        <p class="text-center">
                                            Belum ada produk pada kategori ini.
                                        </p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
    <!-- ***** Produk Ends ***** -->

    <!-- ***** Social Area Starts ***** -->
    <section class="section" id="social">
        <div class="container">

            <div class="section-heading text-center mb-5">
                <h2>Follow Us</h2>
                <p class="text-muted">
                    Temukan inspirasi papan bunga, akrilik, dan selempang terbaru melalui media sosial kami.
                </p>
            </div>

            <div class="row justify-content-center g-4">

                <!-- Instagram Papan Bunga -->
                <div class="col-lg-5 col-md-6">
                    <div class="social-card">
                        <div class="social-icon">
                            <i class="fa fa-instagram"></i>
                        </div>

                        <h4>Papan Bunga Pratama Florist Bengkalis</h4>

                        <p>
                            Lihat berbagai hasil karya papan bunga untuk ucapan yudisium, wisuda,
                            pernikahan, duka cita, grand opening, dan lainnya.
                        </p>

                        <a href="https://www.instagram.com/papan_bunga_pratama_florist/" target="_blank" class="social-btn">
                            <i class="fa fa-instagram"></i>
                            @papan_bunga_pratama_florist
                        </a>
                    </div>
                </div>

                <!-- Instagram Selempang -->
                <div class="col-lg-5 col-md-6">
                    <div class="social-card">
                        <div class="social-icon">
                            <i class="fa fa-instagram"></i>
                        </div>

                        <h4>Selempang Pratama Bengkalis</h4>

                        <p>
                            Temukan berbagai desain selempang wisuda, ulang tahun,
                            dan acara spesial lainnya.
                        </p>

                        <a href="https://www.instagram.com/selempang_pratama_bengkalis/" target="_blank" class="social-btn">
                            <i class="fa fa-instagram"></i>
                            @selempang_pratama_bengkalis
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ***** Social Area Ends ***** -->
@endsection
