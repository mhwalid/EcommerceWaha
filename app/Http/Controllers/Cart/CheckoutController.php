<?php

namespace App\Http\Controllers\Cart;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use DateTime;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Cart::count() > 0) {
            Stripe::setApiKey('sk_test_51ICRVlKY2kJe9mdGuwbLYuT2xQYt3bYd9YDIvpSRu6H8kOj5CIBsSNcPGqtWllaAJY4175CYlJwmiIMeMBpGygBN00Meq2dcfF');
            $intent = PaymentIntent::create([
                'amount' => round(Cart::total(), 2) * 100,
                'currency' => 'eur',
                'payment_method_types' => ['card'],
            ]);

            $clientSecret = Arr::get($intent, 'client_secret');
            return view('Checkout.index', [
                'clientSecret' => $clientSecret,
            ]);
        }
        return redirect()->route('Shop.store');
    }

    public function store(Request $rq)
    {

        $data = $rq->json()->all();

        $order = new Order();
        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s');
        $products = [];
        $i = 0;

        foreach (Cart::content() as $product) {
            $products['product_' . $i][] = $product->model->title;
            $products['product_' . $i][] = $product->model->price;
            $products['product_' . $i][] = $product->qty;
            $i++;
        }
        $order->products = serialize($products);
        $order->user_id = 15;
        $order->save();

        if ($data['paymentIntent']['status'] == 'succeeded') {
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
}
