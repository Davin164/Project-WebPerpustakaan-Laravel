@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Admin - Manajemen Buku</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror"
                   id="title" name="title" value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Jenis Buku</label>
            <input type="text" class="form-control @error('type') is-invalid @enderror"
                   id="type" name="type" value="{{ old('type') }}" required>
            @error('type')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori Buku</label>
            <input type="text" class="form-control @error('category') is-invalid @enderror"
                   id="category" name="category" value="{{ old('category') }}" required>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Buku</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror"
                   id="image" name="image" accept="image/jpeg,image/png,image/jpg">
            <small class="text-muted">Format: JPG, JPEG, PNG (Max. 2MB)</small>
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pdf" class="form-label">PDF Buku</label>
            <input type="file" class="form-control @error('pdf') is-invalid @enderror"
                   id="pdf" name="pdf" accept=".pdf">
            <small class="text-muted">Format: PDF (Max. 10MB)</small>
            @error('pdf')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">
            Tambah Buku
        </button>
    </form>

    <hr class="my-4">

    <h2 class="my-4">Daftar Buku</h2>

    @if($books->count() > 0)
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Jenis</th>
                        <th>Kategori</th>
                        <th>Gambar</th>
                        <th>PDF</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $index => $book)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->type }}</td>
                        <td>{{ $book->category }}</td>
                        <td>
                            @if($book->image)
                                <img src="{{ asset('storage/' . $book->image) }}"
                                     alt="{{ $book->title }}"
                                     class="img-thumbnail"
                                     style="max-width: 100px; max-height: 100px; object-fit: cover;">
                            @else
                                <span class="text-muted">Tidak ada gambar</span>
                            @endif
                        </td>
                        <td>
                            @if($book->pdf)
                                <a href="{{ asset('storage/' . $book->pdf) }}"
                                   target="_blank"
                                   class="btn btn-sm btn-info">
                                    Lihat PDF
                                </a>
                            @else
                                <span class="text-muted">Tidak ada PDF</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('admin.update.view', $book->id) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                                <form action="{{ route('admin.delete', $book->id) }}"
                                      method="POST"
                                      style="display: inline;"
                                      onsubmit="return confirm('Yakin ingin menghapus buku {{ $book->title }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                    Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info">
            Belum ada buku. Silakan tambahkan buku baru di atas.
        </div>
    @endif
</div>
@endsection
