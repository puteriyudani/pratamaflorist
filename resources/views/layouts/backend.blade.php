<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
            overflow-x: hidden;
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: #36220b;
            color: #fff;
            z-index: 1050;
            transition: left .3s ease;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 14px 20px;
            transition: .3s;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, .15);
        }

        .sidebar a.active {
            background: rgba(255, 255, 255, .2);
            border-left: 4px solid #fff;
            font-weight: 600;
        }

        .content {
            margin-left: 260px;
            transition: margin-left .3s;
        }

        #overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .4);
            z-index: 1040;
        }

        #overlay.show {
            display: block;
        }

        @media (max-width: 991.98px) {

            .sidebar {
                left: -260px;
            }

            .sidebar.show {
                left: 0;
            }

            .content {
                margin-left: 0;
            }

        }

        .navbar {
            box-shadow: 0 3px 8px rgba(0, 0, 0, .1);
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .08);
        }

        .card-header {
            background: #36220b;
        }

        .table thead {
            background: #36220b;
            color: white;
        }

        .dropdown-item.text-danger:hover {
            background: #f8d7da;
            color: #dc3545 !important;
        }
    </style>

</head>

<body>
    <div id="overlay"></div>

    <div class="sidebar">

        <h4 class="text-center py-4">
            🌸 Pratama Florist
        </h4>

        <a href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') || request()->routeIs('products.*') ? 'active' : '' }}">
            <i class="bi bi-flower1"></i>
            Produk
        </a>

        <a href="{{ route('kategoris.index') }}" class="{{ request()->routeIs('kategoris.*') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            Kategori
        </a>

        <a href="{{ route('banner.index') }}" class="{{ request()->routeIs('banner.*') ? 'active' : '' }}">
            <i class="bi bi-images"></i>
            Banner
        </a>

    </div>

    <div class="content">
        <nav class="navbar navbar-expand-lg bg-white">
            <button class="btn btn-outline-secondary d-lg-none ms-3" id="btnSidebar">

                <i class="bi bi-list fs-4"></i>

            </button>
            <div class="dropdown ms-auto me-4">

                <a class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown">

                    <i class="bi bi-person-circle"></i>

                    Admin

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>
                        <a class="dropdown-item" href="#">
                            Profil
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Logout
                            </button>
                        </form>
                    </li>

                </ul>

            </div>
        </nav>

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const btn = document.getElementById("btnSidebar");
            const sidebar = document.querySelector(".sidebar");
            const overlay = document.getElementById("overlay");

            btn.addEventListener("click", function() {
                sidebar.classList.toggle("show");
                overlay.classList.toggle("show");
            });

            overlay.addEventListener("click", function() {
                sidebar.classList.remove("show");
                overlay.classList.remove("show");
            });

        });
    </script>

</body>

</html>
