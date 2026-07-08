<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->paginate(10);

        return view('banner.index', compact('banners'));
    }

    public function create()
    {
        return view('banner.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
                'urutan' => 'required|integer|min:0',
                'is_active' => 'nullable|boolean',
            ],
            [
                'image.required' => 'Banner wajib dipilih.',
                'image.image' => 'File harus berupa gambar.',
                'image.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'image.max' => 'Ukuran gambar maksimal 2 MB.',
                'image.uploaded' => 'Upload gambar gagal. Pastikan ukuran file tidak lebih dari 2 MB.',

                'urutan.required' => 'Urutan banner wajib diisi.',
                'urutan.integer' => 'Urutan harus berupa angka.',
            ]
        );

        $input = $request->all();

        $input['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->storeAs('banner', $imageName, 'public');

            $input['image'] = $imageName;
        }

        Banner::create($input);

        return redirect()->route('banner.index')
            ->with('success', 'Banner berhasil ditambahkan.');
    }

    public function edit(Banner $banner)
    {
        return view('banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate(
            [
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'urutan' => 'required|integer|min:0',
                'is_active' => 'nullable|boolean',
            ],
            [
                'image.image' => 'File harus berupa gambar.',
                'image.mimes' => 'Format gambar harus JPG, JPEG, PNG, atau WEBP.',
                'image.max' => 'Ukuran gambar maksimal 2 MB.',
                'image.uploaded' => 'Upload gambar gagal. Pastikan ukuran file tidak lebih dari 2 MB.',

                'urutan.required' => 'Urutan banner wajib diisi.',
                'urutan.integer' => 'Urutan harus berupa angka.',
            ]
        );

        $input = $request->all();

        $input['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {

            if ($banner->image) {
                Storage::disk('public')->delete('banner/' . $banner->image);
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();

            $request->image->storeAs('banner', $imageName, 'public');

            $input['image'] = $imageName;
        }

        $banner->update($input);

        return redirect()->route('banner.index')
            ->with('success', 'Banner berhasil diperbarui.');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image) {
            Storage::disk('public')->delete('banner/' . $banner->image);
        }

        $banner->delete();

        return redirect()->route('banner.index')
            ->with('success', 'Banner berhasil dihapus.');
    }
}
