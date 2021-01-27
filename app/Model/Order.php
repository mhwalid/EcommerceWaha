<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $hidden = ['deleted_at'];


    public function user()
    {

        return $this->belongsTo('App\Model\User');
    }
}
