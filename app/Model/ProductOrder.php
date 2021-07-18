<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Product
{
    protected $table = 'ProductOrders';
    public $timestamps = false;
}
