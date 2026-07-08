@extends('layouts.backend')
@section('title', 'Produk - Pratama Florist Bengkalis')
@section('content')
    <div class="container-fluid p-4">

        <div class="card">

            <div class="card-header text-white d-flex justify-content-between align-items-center">

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
                                            <img src="{{ asset('storage/images/' . $product->image) }}" width="70"
                                                class="rounded">
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
@endsection
