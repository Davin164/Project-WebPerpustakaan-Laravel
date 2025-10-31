@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Edit Buku</h5>
        </div>
        <div class="card-body">
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

            {{-- ✅ PERBAIKI: Pakai $books->id, bukan $books->$books --}}
            <form action="{{ route('admin.update', $books->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- ✅ Tidak pakai @method('PUT') karena route pakai POST --}}

                <div class="mb-3">
                    <label for="title" class="form-label">Judul Buku</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                           id="title" name="title" value="{{ old('title', $books->title) }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">Tipe Buku</label>
                    <input type="text" class="form-control @error('type') is-invalid @enderror"
                           id="type" name="type" value="{{ old('type', $books->type) }}" required>
                    @error('type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <input type="text" class="form-control @error('category') is-invalid @enderror"
                           id="category" name="category" value="{{ old('category', $books->category) }}" required>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Buku</label>
                    @if($books->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $books->image) }}" alt="Current Image" class="img-thumbnail" style="max-height: 200px">
                            <p class="text-muted small mb-0">Gambar saat ini</p>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                           id="image" name="image" accept="image/jpeg,image/png,image/jpg">
                    <small class="text-muted">Format: JPG, JPEG, PNG (Max. 2MB). Kosongkan jika tidak ingin mengubah gambar.</small>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pdf" class="form-label">File PDF</label>
                    @if($books->pdf)
                        <div class="mb-2">
                            <a href="{{ asset('storage/' . $books->pdf) }}" target="_blank" class="btn btn-sm btn-info">
                                📄 Lihat PDF Saat Ini
                            </a>
                        </div>
                    @endif
                    <input type="file" class="form-control @error('pdf') is-invalid @enderror"
                           id="pdf" name="pdf" accept=".pdf">
                    <small class="text-muted">Format: PDF (Max. 10MB). Kosongkan jika tidak ingin mengubah PDF.</small>
                    @error('pdf')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        💾 Update Buku
                    </button>
                    <a href="{{ route('admin') }}" class="btn btn-secondary">
                        ← Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
