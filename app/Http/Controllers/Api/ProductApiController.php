<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller;


class ProductApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum'); // Pastikan Hanya User Yang Login Bisa Akses
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Ambil Semua Produk Terbaru Dan Tampilkan 10 Produk Per Halaman
    $products = Product::latest()->paginate(10);

    // Kirim Data Produk Ke Halaman Tampilan
    return view('products.index', compact('products'));
}


    /**
    * Menampilkan Form Tambah Produk
    */
    public function create()
{
    // Ambil Semua Kategori Yang Tersedia
    $categories = Category::all();

    // Tampilkan Halaman Tambah Produk Dengan Daftar Kategori
    return view('products.create', compact('categories'));
}


    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        'criteria' => 'required|string',
        'favorite' => 'required|boolean',
        'status' => 'required|string',
        'stock' => 'required|integer|min:0',
    ]);

    $product = Product::create($request->all());

    // Simpan Gambar Jika Ada
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->update(['image' => $imagePath]);
    }

    return redirect()->route('products.index')->with('success', 'Produk Berhasil Ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    // Menampilkan Form Edit Produk
    public function edit(Product $product)
{
    // Ambil Semua Kategori
    $categories = Category::all();

    // Tampilkan Halaman Edit Produk Dengan Data Produk Dan Kategori
    return view('products.edit', compact('product', 'categories'));
}


    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, Product $product)
{
    // Validasi Data Yang Dikirim Dari Form
    $request->validate([
        'category_id' => 'required',
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2000',
        'criteria' => 'required|string',
        'favorite' => 'required|boolean',
        'status' => 'required|string',
        'stock' => 'required|integer|min:0',
    ]);

    // Perbarui Data Produk
    $product->update($request->all());

    // Jika Ada Gambar Baru, Simpan Dan Ganti Yang Lama
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->update(['image' => $imagePath]);
    }

    return redirect()->route('products.index')->with('success', 'Produk Berhasil Diperbarui');
}
    /**
     * Remove the specified resource from storage.
     */
   public function destroy(Product $product)
   {
    // Jika Produk Punya Gambar, Hapus
    if ($product->image) {
        Storage::delete('public/' . $product->image);
    }

    // Hapus Produk Dari Database
    $product->delete();

    // Kembali Ke Daftar Produk Dengan Pesan Sukses
    return redirect()->route('products.index')->with('success', 'Produk Berhasil Dihapus');
}

}
