@extends('layouts.app')

@section('content')
    <h2>Tambah Post</h2>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <!-- Anda bisa menambahkan field lain di sini -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
