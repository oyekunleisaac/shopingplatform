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

    public function viewCart()
{
    $userId = auth()->id();

    $cartItems = \App\Models\Cart::with('product')->where('user_id', $userId)->get();

    if ($cartItems->isEmpty()) {
        return response()->json(['message' => 'Your cart is empty.'], 200);
    }

    $data = $cartItems->map(function ($item) {
        return [
            'product_id' => $item->product_id,
            'name' => $item->product->name,
            'price' => $item->product->price,
            'quantity' => $item->quantity,
            'total' => $item->product->price * $item->quantity,
        ];
    });

    $total = $data->sum('total');

    return response()->json([
        'items' => $data,
        'total' => $total,
    ]);
}

}
