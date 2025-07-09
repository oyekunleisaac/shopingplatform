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
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048', 
        'price' => 'required|numeric',
        'category' => 'required|string',
    ]);

    $imagePath = $request->file('image')->store('products', 'public');

    $product = Product::create([
        'name' => $validated['name'],
        'image' => $imagePath, 
        'price' => $validated['price'],
        'category' => $validated['category'],
    ]);

    return response()->json($product, 201);
}

}
