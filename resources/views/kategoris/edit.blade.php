@extends('layouts.backend')
@section('title', 'Edit Kategori - Pratama Florist Bengkalis')
@section('sidebar')
    <div class="sidebar">

        <h4 class="text-center py-4">🌸 Pratama Florist</h4>

        <a href="{{ route('dashboard') }}">
            <i class="bi bi-flower1"></i>
            Produk
        </a>

        <a href="{{ route('kategoris.index') }}" class="{{ request()->routeIs('kategoris.*') ? 'active' : '' }}">
            <i class="bi bi-grid"></i>
            Kategori
        </a>

    </div>
@endsection
@section('content')
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

                <div class="card-header bg-warning">

                    Edit Kategori

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

                    <form action="{{ route('kategoris.update', $kategori) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label>Nama Kategori</label>

                            <input type="text" name="nama_kategori" class="form-control"
                                value="{{ old('nama_kategori', $kategori->nama_kategori) }}">

                        </div>

                        <button class="btn btn-warning">

                            Update

                        </button>

                        <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">

                            Kembali

                        </a>

                    </form>

                </div>

            </div>

        </div>

    </div>
@endsection
