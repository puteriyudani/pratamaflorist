@extends('layouts.backend')
@section('title', 'Kategori - Pratama Florist Bengkalis')
@section('content')
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

                                        <a href="{{ route('kategoris.edit', $kategori) }}" class="btn btn-warning btn-sm">

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
@endsection
