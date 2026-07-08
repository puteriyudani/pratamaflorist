@extends('layouts.backend')
@section('title', 'Banner - Pratama Florist Bengkalis')
@section('content')
    <div class="container-fluid p-4">

        <div class="card">

            <div class="card-header text-white d-flex justify-content-between align-items-center">

                <h5 class="mb-0">
                    <i class="bi bi-image"></i>
                    Daftar Banner
                </h5>

                <a href="{{ route('banner.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Banner
                </a>

            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <i class="bi bi-x-circle-fill me-2"></i>
                        {{ session('error') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">

                        <i class="bi bi-exclamation-triangle-fill me-2"></i>

                        <strong>Terdapat kesalahan :</strong>

                        <ul class="mt-2 mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <button type="button" class="btn-close" data-bs-dismiss="alert">
                        </button>

                    </div>
                @endif

                <div class="table-responsive">

                    <table class="table table-bordered table-hover align-middle">

                        <thead>

                            <tr>

                                <th width="5%">No</th>
                                <th width="25%">Banner</th>
                                <th width="15%">Urutan</th>
                                <th width="15%">Status</th>
                                <th width="15%">Dibuat</th>
                                <th width="15%">Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse($banners as $banner)
                                <tr>

                                    <td>{{ $banners->firstItem() + $loop->index }}</td>

                                    <td>

                                        @if ($banner->image)
                                            <img src="{{ asset('storage/banner/' . $banner->image) }}"
                                                class="img-fluid rounded" style="max-width:200px;">
                                        @else
                                            <img src="https://placehold.co/200x80?text=No+Banner" class="rounded">
                                        @endif

                                    </td>

                                    <td>

                                        {{ $banner->urutan }}

                                    </td>

                                    <td>

                                        @if ($banner->is_active)
                                            <span class="badge bg-success">
                                                Aktif
                                            </span>
                                        @else
                                            <span class="badge bg-secondary">
                                                Nonaktif
                                            </span>
                                        @endif

                                    </td>

                                    <td>

                                        {{ $banner->created_at->format('d-m-Y') }}

                                    </td>

                                    <td>

                                        <a href="{{ route('banner.edit', $banner->id) }}" class="btn btn-warning btn-sm">

                                            <i class="bi bi-pencil"></i>

                                        </a>

                                        <form action="{{ route('banner.destroy', $banner->id) }}" method="POST"
                                            class="d-inline">

                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin ingin menghapus banner ini?')">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="6" class="text-center">

                                        Belum ada data banner.

                                    </td>

                                </tr>
                            @endforelse

                        </tbody>

                    </table>

                </div>

                <div class="mt-3">

                    {{ $banners->links() }}

                </div>

            </div>

        </div>

    </div>
@endsection
