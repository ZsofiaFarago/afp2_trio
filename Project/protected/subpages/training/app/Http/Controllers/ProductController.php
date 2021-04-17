<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use League\CommonMark\Inline\Parser\EscapableParser;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }
    function detail($id)
    {
        $data = Product::find($id);

        return view('detail', ['product' => $data]);
    }
    function search(Request $request)
    {
        $searched_data = $request->input('query');
        $data = Product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view(
            'search',
            [
                'products' => $data,
                'searched_data' => $searched_data
            ]
        );
    }
    function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect()->route('products');
        } else {
            return redirect()->route('login');
        }
    }
    static function cartItem()
    {
        $userId = Session::get('user')['id'];
        return Cart::where('user_id', $userId)->count();
    }
    function cartList()
    {
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view('cart', ['products' => $products]);
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect()->route('cart');
    }
    function orderNow()
    {
        $userId = Session::get('user')['id'];
        $total = $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->sum('products.price');

        /* FOR LISTING PRODUCTS IN CART */
        $userId = Session::get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)
            ->select('products.*', 'cart.id as cart_id')
            ->get();

        return view(
            'ordernow',
            [
                'total' => $total,
                'products' => $products,
            ]
        );
    }

    function orderPlace(Request $request)
    {
        $userId = Session::get('user')['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $request->payment;
            $order->payment_status = 'pending';
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        $request->input();
        return redirect()->route('home');
    }

    function myOrders()
    {
        $userId = Session::get('user')['id'];
        $orders = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)
            ->get();
        return view('myorders', ['orders' => $orders]);
    }

    function allProduct()
    {
        $preworkout_count = Product::where('category', '=', 'preworkout')->count();
        $kreatin_count = Product::where('category', '=', 'kreatin')->count();
        $feherje_count = Product::where('category', '=', 'feherje')->count();
        $multivitamin_count = Product::where('category', '=', 'multivitamin')->count();

        return view(
            'product_gallery',
            [
                'products' => Product::all(),
                'preworkout_count' => $preworkout_count,
                'preworkout_count' => $preworkout_count,
                'kreatin_count' => $kreatin_count,
                'feherje_count' => $feherje_count,
                'multivitamin_count' => $multivitamin_count,
            ]
        );
    }
}
