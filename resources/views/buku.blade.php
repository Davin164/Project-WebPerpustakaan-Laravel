    @extends('layouts.app')

    @section('content')
    <div class="container">
        <h1 class="my-4">Perpustakaan</h1>
        <div class="row">
            @foreach($books as $book)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                    @else
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Default Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">Jenis: {{ $book->type }}</p>
                        <p class="card-text">Kategori: {{ $book->category }}</p>
                    @if($book->pdf)
                    <a href="{{ asset('storage/' . $book->pdf) }}" target="_blank" class="btn btn-info btn-sm">Baca PDF</a>
                    <a href="{{ asset('storage/' . $book->pdf) }}" download class="btn btn-success btn-sm">Download PDF</a>
                    @else
                    <p>Tidak ada PDF</p>
                    @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
