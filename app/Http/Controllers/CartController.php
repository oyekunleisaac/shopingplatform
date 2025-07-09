<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $validated['product_id'],
            'quantity' => $validated['quantity']
        ]);

        return response()->json(['message' => 'Item added to cart', 'cart' => $cart]);
    }
}
