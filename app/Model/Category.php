<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{

    protected $table = 'Categories';
    public $timestamps = true;

    protected $hidden = [
        'created_at'
    ];
    protected $fillable = [
        'name',
    ];

    public function product()
    {
        return $this->hasMany('App\Model\Product');
    }
}
