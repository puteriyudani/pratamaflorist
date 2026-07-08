@extends('layouts.backend')

@section('title', 'Tambah Banner - Pratama Florist Bengkalis')

@section('content')
    <div class="container-fluid p-4">

        <div class="card shadow-sm">

            <div class="card-header text-white">

                <h5 class="mb-0">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Banner
                </h5>

            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}

                        <button class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">

                        <i class="bi bi-exclamation-triangle-fill me-2"></i>

                        <strong>Terdapat kesalahan :</strong>

                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button class="btn-close" data-bs-dismiss="alert"></button>

                    </div>
                @endif

                <form action="{{ route('banner.store') }}" method="POST" enctype="multipart/form-data">

                    @csrf

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">
                                Urutan Banner
                            </label>

                            <input type="number" name="urutan" class="form-control" value="{{ old('urutan', 0) }}">

                        </div>

                        <div class="col-md-6 mb-3 d-flex align-items-end">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active"
                                    value="1" checked>

                                <label class="form-check-label" for="is_active">
                                    Banner Aktif
                                </label>

                            </div>

                        </div>

                        <div class="col-md-12 mb-3">

                            <label class="form-label">
                                Gambar Banner
                            </label>

                            <input type="file" name="image" class="form-control" onchange="previewImage(event)">

                        </div>

                        <div class="col-md-12">

                            <img id="preview" src="https://placehold.co/800x250?text=Preview+Banner" class="img-thumbnail"
                                style="max-width:500px;">

                        </div>

                    </div>

                    <button class="btn btn-success">

                        <i class="bi bi-save"></i>

                        Simpan

                    </button>

                    <a href="{{ route('banner.index') }}" class="btn btn-secondary">

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

@endsection
