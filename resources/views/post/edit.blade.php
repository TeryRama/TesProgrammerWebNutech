@extends('layouts.app')

@section('content')
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Judul</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <!-- Anda bisa menambahkan field lain di sini -->
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
