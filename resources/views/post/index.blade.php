@extends('layouts.app')

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Tambah Post Baru</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
