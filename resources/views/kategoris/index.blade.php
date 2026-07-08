@extends('layouts.backend')
@section('title', 'Kategori - Pratama Florist Bengkalis')
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

            <div class="card shadow-sm">

                <div class="card-header text-white d-flex justify-content-between">

                    <h5 class="mb-0">
                        <i class="bi bi-tags"></i>
                        Data Kategori
                    </h5>

                    <a href="{{ route('kategoris.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle"></i>
                        Tambah Kategori
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

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle">

                            <thead>

                                <tr>

                                    <th width="10%">No</th>
                                    <th>Nama Kategori</th>
                                    <th width="20%">Aksi</th>

                                </tr>

                            </thead>

                            <tbody>

                                @forelse($kategoris as $kategori)
                                    <tr>

                                        <td>{{ $kategoris->firstItem() + $loop->index }}</td>

                                        <td>{{ $kategori->nama_kategori }}</td>

                                        <td>

                                            <a href="{{ route('kategoris.edit', $kategori) }}"
                                                class="btn btn-warning btn-sm">

                                                <i class="bi bi-pencil"></i>

                                            </a>

                                            <form action="{{ route('kategoris.destroy', $kategori) }}" method="POST"
                                                class="d-inline">

                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Hapus kategori?')">

                                                    <i class="bi bi-trash"></i>

                                                </button>

                                            </form>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="3" class="text-center">

                                            Belum ada kategori.

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>

                    {{ $kategoris->links() }}

                </div>

            </div>

        </div>

    </div>
@endsection
