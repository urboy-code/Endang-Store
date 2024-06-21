<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::with('products')->get();
        return view('shop', compact('products', 'categories'));
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => [
                'image' => $product->image,
            ]
        ]);

        $userId = Auth::id();
        // dd($userId);

        $order = new Order();
        $order->user_id = $userId;
        $order->product_id = $product->id;
        $order->quantity = 1;
        $order->price = $product->price;
        $order->total_amount = $product->price;
        $order->save();

        Alert::success('Success', 'Product added to cart successfully!');
        return redirect()->back();
    }

    public function qtyIncrement($id)
    {
        $product = Cart::get($id);
        $updateQty = $product->qty + 1;

        Cart::update($id, $updateQty);
        return redirect()->back();
    }

    public function qtyDecrement($id)
    {
        $product = Cart::get($id);
        $updateQty = $product->qty - 1;
        if ($updateQty > 0) {
            Cart::update($id, $updateQty);
        }

        return redirect()->back();
    }

    public function removeProduct($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }
}
