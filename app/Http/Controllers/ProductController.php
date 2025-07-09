<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'image' => 'required|string',
        'price' => 'required|numeric',
        'category' => 'required|string',
    ]);

    $product = Product::create($validated);

    return response()->json($product, 201);
}
}
