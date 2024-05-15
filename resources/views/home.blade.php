@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{ Auth::user()->name }}</b></h4>

  <h5>Daftar Buku</h5>
  <a href="{{ route('books.create') }}" class="btn btn-primary">Tambah Buku Baru</a>
  
  <table class="table">
    <thead>
      <tr>
        <th>ISBN</th>
        <th>Nama</th>
        <th>Tahun</th>
        <th>Halaman</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($books as $book)
      <tr>
        <td>{{ $book->isbn }}</td>
        <td>{{ $book->name }}</td>
        <td>{{ $book->year }}</td>
        <td>{{ $book->page }}</td>
        <td>{{ $book->author }}</td>
        <td>{{ $book->publisher->identifier }}</td> {{-- Ubah $book->penerbit menjadi $book->publisher->identifier --}}
        <td>
          <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a> {{-- Menambahkan route ke Edit --}}
          <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
        <tr>
          <td colspan="7">Tidak ada buku yang tersedia.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <h5>Daftar Penerbit</h5>
  <a href="{{ route('publishers.create') }}" class="btn btn-primary">Tambah Penerbit Baru</a>
  
  <table class="table">
    <thead>
      <tr>
        <th>Identifier</th>
        <th>Nama Depan</th>
        <th>Nama Belakang</th>
        <th>Aksi</th> {{-- Menambahkan kolom untuk aksi --}}
      </tr>
    </thead>
    <tbody>
      @forelse($publishers as $publisher)
      <tr>
        <td>{{ $publisher->identifier }}</td>
        <td>{{ $publisher->fname }}</td>
        <td>{{ $publisher->lname }}</td>
        <td>
          <a href="{{ route('publishers.edit', $publisher->id) }}" class="btn btn-primary">Edit</a> {{-- Menambahkan route ke Edit --}}
          <form action="{{ route('publishers.destroy', $publisher->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Hapus</button>
          </form>
        </td>
      </tr>
      @empty
        <tr>
          <td colspan="4">Tidak ada penerbit yang tersedia.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
@endsection
