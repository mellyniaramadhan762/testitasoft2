<!-- resources/views/books/create.blade.php -->

@extends('master')

@section('konten')
  <h4>Selamat Datang <b>{{ Auth::user()->name }}</b></h4>

  <h5>Form Tambah Penerbit</h5>
  <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="isbn">Identifier:</label>
            <input type="text" class="form-control" id="identifier" name="identifier">
        </div>
        <div class="form-group">
            <label for="nama">Nama Depan:</label>
            <input type="text" class="form-control" id="fname" name="fname">
        </div>
        <div class="form-group">
            <label for="nama">Nama Belakang:</label>
            <input type="text" class="form-control" id="lname" name="lname">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ route('home') }}" class="btn btn-default">Kembali</a>
  </form>
@endsection
