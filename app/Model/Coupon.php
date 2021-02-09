<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //


    public function discount($subtotal)
    {
        return ($subtotal * ($this->price_off / 100));
    }
}
