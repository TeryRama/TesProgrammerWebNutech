<x-app-layout>

    <div class="container mt-5">        
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                  <div class="container-fluid">
                    <div class="row mb-2">
                      <div class="col-sm-6">
                        <h1>Tambah Buku</h1>
                      </div>
                      <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="#">Buku</a></li>
                          <li class="breadcrumb-item active">Tambah Buku</li>
                        </ol>
                      </div>
                    </div>
                  </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="card card-primary">
                          <div class="card-header">
                            <h3 class="card-title">Input Buku</h3>
                          </div>
                          <div class="card-body">
                              <div class="form-group">
                                <label for="bookTitle">Judul Buku</label>
                                <input type="text" name="title" class="form-control" id="bookTitle" placeholder="Masukkan Judul Buku">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="author_id">Penulis</label>
                                <select name="author_id" id="author_id" class="form-control">
                                    <option value="">- Pilih -</option>
                                    @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="bookImage">Foto Buku</label>
                                <input type="file" class="form-control" id="bookImage" name="bookImage">
                                @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="HargaBeli">Harga Beli:</label>
                                <input type="number" step="0.01" class="form-control" id="HargaBeli" name="HargaBeli" placeholder="Masukkan Harga Beli">
                                @error('HargaBeli')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            
                            <!-- Input untuk HargaJual -->
                            <div class="form-group">
                                <label for="HargaJual">Harga Jual:</label>
                                <input type="number" step="0.01" class="form-control" id="HargaJual" name="HargaJual" placeholder="Masukkan Harga Jual">
                                @error('HargaJual')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                            
                            <!-- Input untuk Stok -->
                            <div class="form-group">
                                <label for="Stok">Stok:</label>
                                <input type="number" class="form-control" id="Stok" name="Stok" placeholder="Masukkan Jumlah Stok">
                                @error('Stok')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div>
                              <!-- Tambahkan input lain jika diperlukan -->

                            </div>
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
              </div>
        </form>
    </div>
</x-app-layout>
