<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;
use Midtrans\Snap;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_gallery')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();
        return view('pages.frontend.index', compact('category', 'product'));
    }
    public function deatailProduct($slug)
    {
        $product = Product::with('product_gallery')->where('slug', $slug)->first();
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $recomendaction = Product::with('product_gallery')->select('id', 'name', 'slug', 'price')->inRandomOrder()->limit(4)->get();
        return view('pages.frontend.detail-product', compact('product', 'category', 'recomendaction'));
    }

    public function detailCategory($slug)
    {

        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $categories = Category::where('slug', $slug)->first();
        $product = Product::with('product_gallery')->where('category_id', $categories->id)->get();


        return view('pages.frontend.detail-category', compact('category', 'categories', 'product'));
    }

    public function cart(Request $request)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->latest()->get();
        return view('pages.frontend.cart', compact('category', 'cart'));
    }
    public function adddToCart(Request $request, $id)
    {

        try {

            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('cart');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', ' Terjadi Kesalahan');
        }
    }

    public function deleteCart($id)
    {
        try {
            Cart::findOrFail($id)->delete();

            return redirect()->route('cart');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back();
        }
    }


    public function checkOut(Request $request)
    {
        try {
            $data = $request->all();

            $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();

            $transaction = Transaction::create([
                "user_id" => auth()->user()->id,
                "slug" => Str::slug($data['name']) . '-' . time(),
                "name" => $data['name'],
                "email" => $data['email'],
                "addres" => $data['addres'],
                "phone" => $data['phone'],
                "total_price" => $cart->sum('product.price')
            ]);

            foreach ($cart as $item) {
                TransactionItem::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $item->product_id,
                    'transaction_id' => $transaction->id
                ]);
            }

            Cart::where('user_id', auth()->user()->id)->delete();

            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$clientKey = config('services.midtrans.clientKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            $midtrans = [
                'transaction_details' => [
                    'order_id' => 'Farros' . $transaction->id,
                    'gross_amount' => (int) $transaction->total_price
                ],
                'customer_details' => [
                    'first_name' => $transaction->name,
                    'email' => $transaction->email,
                    'phone' => $transaction->phone
                ],
                'enable_payments' => ['gopay', 'bank_transfer'],
                'vtweb' => []
            ];

            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            $transaction->update([
                'payment_url' => $paymentUrl
            ]);

            return redirect($paymentUrl);
        } catch (\Exception $th) {
            dd($th->getMessage());
            return redirect()->back();
        }
    }
}
