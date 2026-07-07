<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - Pratama Florist</title>

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
            background: #198754;
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
            background: #198754;
            color: white;
        }

        .dropdown-item.text-danger:hover {
            background-color: #f8d7da;
            color: #dc3545 !important;
        }
    </style>

</head>

<body>

    <div class="sidebar">

        <h4 class="text-center py-4">🌸 Pratama Florist</h4>

        <a href="{{ route('dashboard') }}"
            class="{{ request()->routeIs('dashboard') || request()->routeIs('products.*') ? 'active' : '' }}">
            <i class="bi bi-flower1"></i>
            Produk
        </a>

        <a href="{{ route('kategoris.index') }}">
            <i class="bi bi-grid"></i>
            Kategori
        </a>

    </div>


    <div class="content">

        <nav class="navbar navbar-expand-lg bg-white">
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


        <div class="container-fluid p-4">

            <div class="card shadow-sm">

                <div class="card-header bg-warning">

                    <h5 class="mb-0">

                        <i class="bi bi-pencil-square"></i>

                        Edit Produk

                    </h5>

                </div>

                <div class="card-body">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ session('success') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-x-circle-fill me-2"></i>
                            {{ session('error') }}

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">

                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <strong>Terdapat kesalahan:</strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Nama Produk</label>

                                <input type="text" name="nama_produk" class="form-control"
                                    value="{{ old('nama_produk', $product->nama_produk) }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Kategori</label>

                                <select name="id_kategori" class="form-select">

                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}"
                                            {{ $kategori->id == $product->id_kategori ? 'selected' : '' }}>

                                            {{ $kategori->nama_kategori }}

                                        </option>
                                    @endforeach

                                </select>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Harga</label>

                                <input type="number" name="harga" class="form-control"
                                    value="{{ old('harga', $product->harga) }}">

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">Stok</label>

                                <input type="number" name="stok" class="form-control"
                                    value="{{ old('stok', $product->stok) }}">

                            </div>

                            <div class="col-md-6">

                                <label class="form-label">

                                    Foto Produk

                                </label>

                                <input type="file" name="image" class="form-control"
                                    onchange="previewImage(event)">

                            </div>

                            <div class="col-md-6 text-center">

                                @if ($product->image)
                                    <img id="preview" src="{{ asset('storage/images/' . $product->image) }}"
                                        width="200" class="img-thumbnail">
                                @else
                                    <img id="preview" src="https://placehold.co/200x200?text=No+Image" width="200"
                                        class="img-thumbnail">
                                @endif

                            </div>

                        </div>

                        <button class="btn btn-warning">

                            <i class="bi bi-check-circle"></i>

                            Update

                        </button>

                        <a href="{{ route('dashboard') }}" class="btn btn-secondary">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

        <script>
            function previewImage(event) {

                document.getElementById('preview').src =
                    URL.createObjectURL(event.target.files[0]);

            }
        </script>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
