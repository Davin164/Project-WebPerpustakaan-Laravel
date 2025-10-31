<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BooksController extends Controller
{
    // Menampilkan semua buku di halaman home
    public function index()
    {
        $books = Books::all();
        return view('home', compact('books'));
    }

    // Menampilkan semua buku di halaman buku
    public function buku()
    {
        $books = Books::all();
        return view('buku', compact('books'));
    }

    // Menampilkan halaman admin
    public function admin()
    {
        $books = Books::all();
        return view('admin', compact('books'));
    }

    // ✅ PERBAIKI: Tampilkan form edit untuk buku tertentu
    public function updatebook($id)
    {
        $books = Books::findOrFail($id); // Cari buku berdasarkan ID
        return view('update', compact('books'));
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'pdf' => 'nullable|file|mimes:pdf|max:10240', // ✅ Ubah ke 10MB
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images', 'public');
        }

        // Upload PDF dengan nama asli
        if ($request->hasFile('pdf')) {
            $originalName = $request->file('pdf')->getClientOriginalName();
            $validatedData['pdf'] = $request->file('pdf')->storeAs('pdfs', $originalName, 'public');
        }

        Books::create($validatedData);

        return redirect()->route('admin')->with('success', 'Buku berhasil ditambahkan.');
    }

    // ✅ PERBAIKI: Update buku
    public function update(Request $request, $id)
    {
        try {
            $book = Books::findOrFail($id);

            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'type' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
                'pdf' => 'nullable|mimes:pdf|max:10240',
            ]);

            // Update data text
            $book->title = $validatedData['title'];
            $book->type = $validatedData['type'];
            $book->category = $validatedData['category'];

            // Upload image baru kalau ada
            if ($request->hasFile('image')) {
                // Hapus image lama
                if ($book->image && Storage::disk('public')->exists($book->image)) {
                    Storage::disk('public')->delete($book->image);
                }
                $book->image = $request->file('image')->store('images', 'public');
            }

            // Upload PDF baru kalau ada
            if ($request->hasFile('pdf')) {
                // Hapus PDF lama
                if ($book->pdf && Storage::disk('public')->exists($book->pdf)) {
                    Storage::disk('public')->delete($book->pdf);
                }

                // Simpan dengan nama asli
                $originalName = $request->file('pdf')->getClientOriginalName();
                $book->pdf = $request->file('pdf')->storeAs('pdfs', $originalName, 'public');
            }

            $book->save();

            return redirect()->route('admin')->with('success', 'Buku berhasil diupdate!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Menghapus buku
    public function destroy($id)
    {
        $book = Books::findOrFail($id);

        // Hapus file image
        if ($book->image && Storage::disk('public')->exists($book->image)) {
            Storage::disk('public')->delete($book->image);
        }

        // Hapus file PDF
        if ($book->pdf && Storage::disk('public')->exists($book->pdf)) {
            Storage::disk('public')->delete($book->pdf);
        }

        $book->delete();

        return redirect()->route('admin')->with('success', 'Buku berhasil dihapus.');
    }
}
