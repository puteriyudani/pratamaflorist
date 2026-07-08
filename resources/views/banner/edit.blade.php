@extends('layouts.backend')

@section('title', 'Edit Banner - Pratama Florist Bengkalis')

@section('content')

    <div class="container-fluid p-4">

        <div class="card shadow-sm">

            <div class="card-header bg-warning">

                <h5 class="mb-0">

                    <i class="bi bi-pencil-square"></i>

                    Edit Banner

                </h5>

            </div>

            <div class="card-body">

                @if ($errors->any())

                    <div class="alert alert-danger">

                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>

                @endif

                <form action="{{ route('banner.update', $banner->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="col-md-6 mb-3">

                            <label class="form-label">

                                Urutan Banner

                            </label>

                            <input type="number" name="urutan" class="form-control"
                                value="{{ old('urutan', $banner->urutan) }}">

                        </div>

                        <div class="col-md-6 mb-3 d-flex align-items-end">

                            <div class="form-check">

                                <input class="form-check-input" type="checkbox" name="is_active" value="1"
                                    id="is_active" {{ $banner->is_active ? 'checked' : '' }}>

                                <label class="form-check-label" for="is_active">

                                    Banner Aktif

                                </label>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <label class="form-label">

                                Ganti Banner

                            </label>

                            <input type="file" name="image" class="form-control" onchange="previewImage(event)">

                        </div>

                        <div class="col-md-6 text-center">

                            @if ($banner->image)
                                <img id="preview" src="{{ asset('storage/banner/' . $banner->image) }}"
                                    class="img-thumbnail" style="max-width:500px;">
                            @else
                                <img id="preview" src="https://placehold.co/800x250?text=No+Banner" class="img-thumbnail"
                                    style="max-width:500px;">
                            @endif

                        </div>

                    </div>

                    <button class="btn btn-warning">

                        <i class="bi bi-check-circle"></i>

                        Update

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
