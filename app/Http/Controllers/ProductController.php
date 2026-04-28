<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    { 
        $products = Product::with('category')->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function insert()
    {
        $product = Product::create([
            'name' => 'SONIC',
            'price' => 10000000,
            'stock' => 1,
            'category_id' => 2,
            'description' => 'Deskripsi produk',
        ]);

        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'product' => $product,
        ], 201);
    }

    public function update()
    {
        $product = Product::findOrFail(1);
        $product->name = 'kinkpiniks';
        $product->price = 1200000;
        $product->stock = 5;
        $product->description = 'Acer';
        $product->status = 'tersedia';
        $product->save();

        dd($product);
    }

    public function delete()
    {
        $product = Product::findOrFail(56);
        $product->delete();

        dd('Produk telah dihapus');
    }
}