@extends('layouts.backend')
@section('title', 'Tambah Kategori - Pratama Florist Bengkalis')
@section('content')
    <div class="container-fluid p-4">

        <div class="card">

            <div class="card-header text-white">

                Tambah Kategori

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

                <form action="{{ route('kategoris.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label>Nama Kategori</label>

                        <input type="text" name="nama_kategori" class="form-control" value="{{ old('nama_kategori') }}">

                    </div>

                    <button class="btn btn-success">

                        Simpan

                    </button>

                    <a href="{{ route('kategoris.index') }}" class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>
@endsection
