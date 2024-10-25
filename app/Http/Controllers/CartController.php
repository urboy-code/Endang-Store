<?php

namespace App\Http\Controllers;

use App\Models\Cart as ModelsCart;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $cartData = $this->getCartData($userId);

        $products = Cart::content();
        $tax = 0.1;
        $subtotal = 0;
        foreach ($products as $product) {
            $subtotal += $product->price;
        };

        $taxAmount = $subtotal * $tax;
        $total = $taxAmount + $subtotal;
        return view('cart', compact('products', 'subtotal', 'cartData', 'total'));
    }

    public function create($productId)
    {
        $product = Product::findOrFail($productId);
        $data = Cart::content();
        // if (gettype($data) === 'array') {
        //     $data = collect($data); // Convert to collection if necessary
        // }
        $existingItem = $data->where('id', $product->id)->first();

        if ($existingItem) {
            $newQty = $existingItem->qty + 1;
            $newPrice = $product->unit_price * $newQty;

            Cart::update($existingItem->rowId, [
                'qty' => $newQty,
                'price' => $newPrice,
                'options' => [
                    'unit_price' => $product->unit_price,
                    'image' => $product->image,
                    'weight' => $product->weight
                ]
            ]);
        } else {
            // dd($product);
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->unit_price * 1,
                'options' => [
                    'unit_price' => $product->unit_price,
                    'image' => $product->image,
                    'weight' => $product->weight
                ]
            ]);
        }

        // dd(Cart::content());
        if (Auth::check()) {
            $this->saveToDatabase(Auth::id());
        }

        Alert::success('Success', 'Product added to cart successfully!');
        return redirect()->back();
    }

    public function qtyIncrement($id)
    {
        $product = Cart::get($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }

        $newQty = $product->qty + 1;
        $newPrice = $product->options->unit_price * $newQty; // Assuming unit_price is stored in options

        Cart::update($id, [
            'qty' => $newQty,
            'price' => $newPrice
        ]);


        // dd(Cart::content());
        if (Auth::check()) {
            $this->saveToDatabase(Auth::id());
        }

        return redirect()->back();
    }
    public function qtyDecrement($id)
    {
        $product = Cart::get($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }

        $newQty = $product->qty - 1;
        $newPrice = $product->options->unit_price * $newQty; // Assuming unit_price is stored in options

        Cart::update($id, [
            'qty' => $newQty,
            'price' => $newPrice
        ]);


        // dd(Cart::content());
        if (Auth::check()) {
            $this->saveToDatabase(Auth::id());
        }

        return redirect()->back();
    }

    public function saveToDatabase($userId)
    {
        $cartData = Cart::content()->toArray();
        ModelsCart::updateOrCreate(
            ['user_id' => $userId],
            ['cart_data' => json_encode($cartData)]
        );
    }

    public function getCartData($userId)
    {
        $cart = ModelsCart::where('user_id', $userId)->first();

        if ($cart) {
            return json_decode($cart->cart_data, true);
        }

        return [];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);

        if (Auth::check()) {
            $this->saveToDatabase(Auth::id());
        }

        return redirect()->back();
    }
}
