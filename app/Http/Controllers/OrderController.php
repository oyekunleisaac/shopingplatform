<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
public function checkout()
{
    $userId = auth()->id();
    $cartItems = Cart::where('user_id', $userId)->with('product')->get();

    if ($cartItems->isEmpty()) {
        return response()->json(['message' => 'Cart is empty'], 400);
    }

    $items = $cartItems->map(function ($item) {
        return [
            'product_id' => $item->product_id,
            'name' => $item->product->name,
            'price' => $item->product->price,
            'quantity' => $item->quantity,
            'subtotal' => $item->product->price * $item->quantity,
        ];
    });

    $totalPrice = $items->sum('subtotal');

    $order = Order::create([
        'user_id' => $userId,
        'total_price' => $totalPrice,
        'items' => $items,
    ]);

    Cart::where('user_id', $userId)->delete();

    return response()->json([
        'message' => 'Order placed successfully.',
        'order' => $order,
    ]);
}

}
