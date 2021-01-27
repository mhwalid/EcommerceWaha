<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $table = 'Products';
    public $timestamps = true;

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'description',
        'price',
        'photo_principale',
        'category_id',
        'in_stock',
        'status',
        'range'
    ];


    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }
}
