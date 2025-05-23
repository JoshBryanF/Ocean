@extends('customer.navbar')

@section('title', 'post')

@section('content')
    {{-- <a href="/add-post">add post</a> --}}
    <h2>Post</h2>
    <form action="/add-post" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Pilih Gambar:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <label for="caption">Caption:</label>
        <textarea id="caption" name="caption" rows="4" cols="50" placeholder="Masukkan caption gambar" required></textarea><br><br>
        <button type="submit">Post!</button>
    </form>
@endsection
