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
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: #36220b;
            color: white;
        }

        .sidebar a {
            color: white;
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

        .sidebar a.active i {
            color: #fff;
        }

        .content {
            margin-left: 260px;
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

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 28px;
            color: white;
        }

        .table thead {
            background: #36220b;
            color: white;
        }

        .dropdown-item.text-danger:hover {
            background-color: #f8d7da;
            color: #dc3545 !important;
        }
    </style>

</head>

<body>

    @yield('sidebar')

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
