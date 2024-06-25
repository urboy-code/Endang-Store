<?php

namespace App\Http\Controllers;

use App\Models\Cart as ModelsCart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
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

        $cart = Session::get('cart', []);

        $cart[]=[
            'id' => $product->id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'options' => [
                'image' => $product->image,
            ]
        ];

        Session::put('cart', $cart);

        if(Auth::check()){
            $userId = Auth::id();
            ModelsCart::updateOrCreate(
                ['user_id' => $userId],
                ['cart_data' => json_encode($cart)]
            );
        }

        Alert::success('Success', 'Product added to cart successfully!');
        return redirect()->back();
    }

    public function qtyIncrement($id)
    {
        $cart = Session::get('cart', []);
        foreach($cart as &$item){
            if($item['id'] == $id){
                $item['qty'] += 1;
                break;
            }
        }

        Session::put('cart', $cart);

        if(Auth::check()){
            $this->updateCartInDatabase();
        }

        // Cart::update($id, $updateQty);
        return redirect()->back();
    }

    public function qtyDecrement($id)
    {
        // $product = Cart::get($id);
        // $updateQty = $product->qty - 1;
        // if ($updateQty > 0) {
            //     Cart::update($id, $updateQty);
            // }
        $cart = Session::get('cart', []);
        foreach($cart as &$item){
            if($item['id']==$id && $item['qty']>1){
                $item['qty'] -=1;
                break;
            };
        }

        Session::put('cart', $cart);

        return redirect()->back();
    }

    public function removeProduct($id)
    {
        // Cart::remove($id);
        $cart = Session::get('cart', []);
        foreach ($cart as $key => $item){
            unset($cart[$key]);
            break;
        }
        Session::put('cart', $cart);

        if(Auth::check()){
            $this->updateCartInDatabase();
        }

        return redirect()->back();
    }

    public function updateCartInDatabase(){
        $userId = Auth::id();
        $cart = Session::get('cart', []);
        ModelsCart::updateOrCreate(
            ['user_id' => $userId],
            ['cart' => json_encode($cart)]
        );
    }

    public function show($id){
        $product = Product::findOrFail($id);
        // $category = Category::with('product')->get();
        return view('detail', compact('product'));

        // dd($product);
    }
}
