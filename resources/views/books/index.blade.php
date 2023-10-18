<x-app-layout>
    <!-- ... Bagian awal kode ... -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Buku</h3>
                          </div>
                        <!-- ... Bagian kode tabel pertama ... -->
                        <table id="dataTable1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Penulis</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Stok</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($books as $book)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $book->title }}</td>
                                        <td>{{ $book->author->name ?? 'N/A' }}</td>
                                        <td>{{ $book->HargaBeli }}</td>
                                        <td>{{ $book->HargaJual }}</td>
                                        <td>{{ $book->Stok }}</td>
                                        <td><img src="{{ asset('storage/books/' . $book->pdf_file) }}" alt="Deskripsi Gambar" style="max-width:100px; height:auto;"></td>
<td>
                                            {{-- <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a> --}}
                                            <form action="{{ route('books.destroy', $book->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</x-app-layout>
