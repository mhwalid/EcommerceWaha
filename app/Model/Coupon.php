<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    //


    public function discount($subtotal)
    {
        return (floatval(implode(explode(',', $subtotal))) * ($this->price_off / 100));
    }
}
