<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all(); // ambil semua data buku
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
        // return view('books.create');
    }

    // ... Metode lainnya ...

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { // Validasi
        $validated = $request->validate([
            'title'     => 'required|max:255|unique:books',
            'author_id' => 'required|exists:authors,id',
            'bookImage' => 'required|image|mimes:png,jpg|max:100',
            'HargaBeli' => 'required|numeric',
            'HargaJual' => 'required|numeric',
            'Stok'      => 'required|integer'
        ]);

        // Handle file upload
        $imageName = null;
        if ($request->hasFile('bookImage')) {
            $imageName = time() . '.' . $request->bookImage->extension();
            $request->bookImage->storeAs('public/books', $imageName);
        }

        // Membuat buku dengan data yang telah divalidasi + nama file gambar
        try {
            //code...
            Book::create([
                'title'        => $validated['title'],
                'author_id'    => $validated['author_id'],
                'pdf_file'     => $imageName,
                'is_available' => true,
                'metadata'     => json_encode([]),
                'HargaBeli'    => $validated['HargaBeli'],
                'HargaJual'    => $validated['HargaJual'],
                'Stok'         => $validated['Stok'],
            ]);

            return redirect()->route('books.index')->with('success', 'Book saved successfully!');
        } catch (\Throwable $e) {
            return back()->with('error', 'Terjadi kesalahan saat menyimpan buku: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);

        if (!$book) {
            // Tambahkan respons jika buku tidak ditemukan
            return redirect()->back()->with('error', 'Buku tidak ditemukan.');
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
}
