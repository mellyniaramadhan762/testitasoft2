@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{ Auth::user()->name }}</b></h4>

  <h5>Form Tambah Buku</h5>
  <form action="{{ route('books.store') }}" method="POST">
    @csrf
    <div class="form-group">
      <label for="isbn">ISBN:</label>
      <input type="text" class="form-control" id="isbn" name="isbn">
    </div>
    <div class="form-group">
      <label for="name">Nama:</label>
      <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
      <label for="year">Tahun:</label>
      <input type="text" class="form-control" id="year" name="year">
    </div>
    <div class="form-group">
      <label for="page">Halaman:</label>
      <input type="text" class="form-control" id="page" name="page">
    </div>
    <div class="form-group">
      <label for="author">Penulis:</label>
      <input type="text" class="form-control" id="author" name="author">
    </div>
    <div class="form-group">
      <label for="publisher">Penerbit:</label>
      <select class="form-control" id="publisher" name="publisher">
        @forelse($publishers as $publisher)
          <option value="{{ $publisher->id }}">{{ $publisher->identifier }}</option> {{-- Menampilkan identifier bukan name --}}
        @empty
          <option value="">Tidak ada penerbit</option>
        @endforelse
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('home') }}" class="btn btn-default">Kembali</a>
  </form>
@endsection
