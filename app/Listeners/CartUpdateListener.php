<?php

namespace App\Listeners;

use App\Model\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $code = request()->session()->get('coupon');

        $coupon = Coupon::where('code', $code)->first();

        if ($coupon) {
            request()->session()->put('coupon', [
                'code' => $coupon->code,
                'price_off' => $coupon->discount(Cart::subtotal())
            ]);
        }
    }
}
