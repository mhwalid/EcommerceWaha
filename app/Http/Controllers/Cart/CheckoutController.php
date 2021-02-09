<?php

namespace App\Http\Controllers\Cart;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\Product;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Issuing\Card;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Cart::count() > 0) {

            if (request()->session()->has('coupon')) {
                $total = Cart::subtotal() - request()->session()->get('coupon')['price_off'] + (Cart::subtotal() - request()->session()->get('coupon')['price_off']) * (config('cart.tax') / 100);
            } else {
                $total = Cart::total();
            }

            Stripe::setApiKey('sk_test_51ICRVlKY2kJe9mdGuwbLYuT2xQYt3bYd9YDIvpSRu6H8kOj5CIBsSNcPGqtWllaAJY4175CYlJwmiIMeMBpGygBN00Meq2dcfF');
            $intent = PaymentIntent::create([
                'amount' => round($total, 2) * 100,
                'currency' => 'eur',
                'payment_method_types' => ['card'],

            ]);

            $clientSecret = Arr::get($intent, 'client_secret');
            return view('Checkout.index', [
                'clientSecret' => $clientSecret,
                'total' => $total,
            ]);
        }
        return redirect()->route('Shop.store');
    }

    public function store(Request $rq)
    {
        if ($this->notvalibel()) {
            Session::flash('error', 'la quantité existe plus dans le stock ');
            return response()->json(['success' => false], 400);
        }

        $data = $rq->json()->all();

        $order = new Order();
        $order->payment_intent_id = $data['paymentIntent']['id'];
        // $order->amount = $data['paymentIntent']['amount'];
        $order->amount = Cart::total();
        $order->payment_created_at = (new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s');
        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $path = Product::find($product->id);
            $products['product_' . $i][] = $product->model->name;
            $products['product_' . $i][] = number_format($product->model->price, 2, '.', ' ');
            $products['product_' . $i][] = $product->qty;
            $products['product_' . $i][] = $path->photo_principale ?? '';
            $i++;
        }
        $order->products = serialize($products);
        $order->user_id = Auth::guard('customer')->id();
        $order->save();

        if ($data['paymentIntent']['status'] == 'succeeded') {
            $this->updatestock();
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }



        //return  $data['paymentIntent'];
    }


    public function thankyou()
    {
        return Session::has('success') ? view('Checkout.thankyou') : redirect()->route('Cart.index');
    }

    private function updatestock()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);
            $product->update(['in_stock' => $product->in_stock - $item->qty]);
        }
    }


    private function notvalibel()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->model->id);

            if ($product->in_stock < $item->qty) {
                return true;
            }
        }
        return false;
    }
}
