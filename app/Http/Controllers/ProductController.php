<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = Kategori::all();

        $products = Product::with('kategori');

        if ($request->filled('kategori')) {
            $products->where('id_kategori', $request->kategori);
        }

        $products = $products->latest()->paginate(10)->withQueryString();

        return view('dashboard', compact(
            'products',
            'kategoris',
        ));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('products.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nama_produk' => 'required|max:255',
                'harga' => 'required|numeric',
                'stok' => 'required|integer|min:0',
                'id_kategori' => 'required|exists:kategoris,id',
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'nama_produk.required' => 'Nama produk wajib diisi.',
                'harga.required' => 'Harga wajib diisi.',
                'harga.numeric' => 'Harga harus berupa angka.',
                'stok.required' => 'Stok wajib diisi.',
                'stok.integer' => 'Stok harus berupa angka.',
                'id_kategori.required' => 'Kategori wajib dipilih.',

                'image.required' => 'Foto produk wajib dipilih.',
                'image.image' => 'File yang dipilih harus berupa gambar.',
                'image.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'image.max' => 'Ukuran gambar maksimal 2 MB.',
                'image.uploaded' => 'Upload gambar gagal. Pastikan ukuran file tidak lebih dari 2 MB.',
            ]
        );

        $input = $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->storeAs('images', $imageName, 'public');

            $input['image'] = $imageName;
        }

        Product::create($input);

        return redirect()->route('dashboard')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $kategoris = Kategori::all();

        return view('products.edit', compact('product', 'kategoris'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'nama_produk' => 'required|max:255',
                'harga' => 'required|numeric',
                'stok' => 'required|integer|min:0',
                'id_kategori' => 'required|exists:kategoris,id',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],
            [
                'nama_produk.required' => 'Nama produk wajib diisi.',
                'harga.required' => 'Harga wajib diisi.',
                'harga.numeric' => 'Harga harus berupa angka.',
                'stok.required' => 'Stok wajib diisi.',
                'stok.integer' => 'Stok harus berupa angka.',
                'id_kategori.required' => 'Kategori wajib dipilih.',

                'image.required' => 'Foto produk wajib dipilih.',
                'image.image' => 'File yang dipilih harus berupa gambar.',
                'image.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'image.max' => 'Ukuran gambar maksimal 2 MB.',
                'image.uploaded' => 'Upload gambar gagal. Pastikan ukuran file tidak lebih dari 2 MB.',
            ]
        );

        $input = $request->all();

        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete('images/' . $product->image);
            }

            $image = $request->file('image');

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->storeAs('images', $imageName, 'public');

            $input['image'] = $imageName;
        }

        $product->update($input);

        return redirect()->route('dashboard')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete('images/' . $product->image);
        }

        $product->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
