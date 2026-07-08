@extends('layouts.backend')
@section('title', 'Tambah Produk - Pratama Florist Bengkalis')
@section('content')
    <div class="container-fluid p-4">

        <div class="card shadow-sm">

            <div class="card-header text-white">

                <h5 class="mb-0">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Produk
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

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">Nama Produk</label>

                            <input type="text" name="nama_produk"
                                class="form-control @error('nama_produk') is-invalid @enderror"
                                value="{{ old('nama_produk') }}">

                            @error('nama_produk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">Kategori</label>

                            <select name="id_kategori" class="form-select @error('id_kategori') is-invalid @enderror">

                                <option value="">-- Pilih Kategori --</option>

                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}"
                                        {{ old('id_kategori') == $kategori->id ? 'selected' : '' }}>

                                        {{ $kategori->nama_kategori }}

                                    </option>
                                @endforeach

                            </select>

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">Harga</label>

                            <input type="number" name="harga" class="form-control" value="{{ old('harga') }}">

                        </div>

                        <div class="col-md-6 mb-3">

                            <label class="form-label">Stok</label>

                            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">

                        </div>

                        <div class="col-md-12 mb-3">

                            <label class="form-label">Foto Produk</label>

                            <input type="file" name="image" class="form-control" onchange="previewImage(event)">

                        </div>

                        <div class="col-md-12 mb-3">

                            <img id="preview" src="https://placehold.co/200x200?text=Preview" width="200"
                                class="img-thumbnail">

                        </div>

                    </div>

                    <button class="btn btn-success">
                        <i class="bi bi-save"></i>
                        Simpan
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

            const image = document.getElementById('preview');

            image.src = URL.createObjectURL(event.target.files[0]);

        }
    </script>
@endsection
