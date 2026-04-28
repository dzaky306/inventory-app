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
            'name' => 'alter Ego',
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
        $product = Product::findOrFail(58);
        $product->name = 'Alter Ego';
        $product->price = 1200000;
        $product->stock = 5;
        $product->description = 'Runner up M-Series';
        $product->status = 'habis';
        $product->save();

        dd($product);
    }

    public function delete()
    {
        $product = Product::findOrFail(60);
        $product->delete();

        dd('Produk telah dihapus');
    }
}