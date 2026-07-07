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

            <div class="card">

                <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">
                        <i class="bi bi-flower1"></i>
                        Daftar Produk
                    </h5>

                    <a href="{{ route('products.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Produk
                    </a>

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

                    <form method="GET" action="{{ route('dashboard') }}" class="row g-2 mb-3">
                        <div class="col-md-4">
                            <select name="kategori" class="form-select">
                                <option value="">Semua Kategori</option>

                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ request('kategori') == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-auto">
                            <button class="btn btn-success">
                                Filter
                            </button>

                            <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                                Reset
                            </a>
                        </div>
                    </form>

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead>

                                <tr>

                                    <th width="5%">No</th>
                                    <th width="10%">Foto</th>
                                    <th>Nama Produk</th>
                                    <th>Kategori</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Status</th>
                                    <th width="15%">Aksi</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($products as $product)
                                    <tr>

                                        <td>{{ $products->firstItem() + $loop->index }}</td>

                                        <td>

                                            @if ($product->image)
                                                <img src="{{ asset('storage/images/' . $product->image) }}"
                                                    width="70" class="rounded">
                                            @else
                                                <img src="https://placehold.co/70x70?text=No+Image" class="rounded">
                                            @endif

                                        </td>

                                        <td>

                                            {{ $product->nama_produk }}

                                        </td>

                                        <td>

                                            {{ $product->kategori->nama_kategori }}

                                        </td>

                                        <td>

                                            Rp {{ number_format($product->harga, 0, ',', '.') }}

                                        </td>

                                        <td>

                                            {{ $product->stok }}

                                        </td>

                                        <td>

                                            @if ($product->stok > 0)
                                                <span class="badge bg-success">
                                                    Tersedia
                                                </span>
                                            @else
                                                <span class="badge bg-danger">
                                                    Habis
                                                </span>
                                            @endif

                                        </td>

                                        <td>

                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-warning btn-sm">

                                                <i class="bi bi-pencil"></i>

                                            </a>

                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus produk ini?')">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="8" class="text-center">

                                            Belum ada data produk.

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
