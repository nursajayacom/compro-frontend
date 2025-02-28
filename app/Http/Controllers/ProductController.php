<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('dashboard.products.create', compact('categories','brands'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Setiap file harus gambar
            'stock' => 'integer'
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'category_id.required' => 'Kategori produk wajib diisi.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'brand_id.required' => 'Merek produk wajib diisi.',
            'brand_id.exists' => 'Merek yang dipilih tidak valid.',
            'images.*.image' => 'File harus berupa gambar.',
            'images.*.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'images.*.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        // Simpan data produk
        $product = Product::create($data);

        // Simpan gambar-gambar produk
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');

                $product->images()->create([
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show(Product $product)
    {
        return view('dashboard.products.view', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('dashboard.products.edit', compact('categories', 'product', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Opsional, validasi file gambar
            'stock' => 'integer'
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'category_id.required' => 'Kategori produk wajib diisi.',
            'category_id.exists' => 'Kategori yang dipilih tidak valid.',
            'brand_id.required' => 'Merek produk wajib diisi.',
            'brand_id.exists' => 'Merek yang dipilih tidak valid.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'image.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $product->update($data);

        // Menghapus gambar lama jika ada input `remove_images`
        if ($request->has('remove_images')) {
            foreach ($request->remove_images as $imageId) {
                $image = ProductImage::find($imageId);
                if ($image) {
                    Storage::delete('public/' . $image->image_path);
                    $image->delete();
                }
            }
        }

        // Simpan gambar baru jika diunggah
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('products', 'public');
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imagePath
                ]);
            }
        }

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        // Hapus semua gambar terkait di storage
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->image_path);
            $image->delete();
        }

        // Hapus produk
        $product->delete();

        // Redirect ke halaman produk dengan pesan sukses
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }

}
