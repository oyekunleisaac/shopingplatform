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
        $cartItems = Cart::where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['message' => 'Cart is empty'], 400);
        }

        $order = Order::create([
            'user_id' => $userId,
            'total' => $cartItems->sum(fn($item) => $item->product->price * $item->quantity),
        ]);

        //  attach order items and clear cart
        Cart::where('user_id', $userId)->delete();

        return response()->json(['message' => 'Order placed', 'order' => $order]);
    }
}
