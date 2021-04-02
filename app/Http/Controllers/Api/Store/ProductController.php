<?php

namespace App\Http\Controllers\Api\Store;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Model\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $productsindex = ProductResource::collection(DB::table('Products')->orderBy('updated_at', 'desc')->limit(6)->get());
        $newproduct = ProductResource::collection(Product::orderBy('created_at', 'desc')->limit(4)->get());

        return response()->json(['productsindex' => $productsindex, 'newproduct' => $newproduct]);
    }
    public function show($id)
    {
        $product = Product::find($id);
        $stock = $product->in_stock == 0 ? 'Indisponible' : 'Disponible';


        return response()->json(['product' => $product, 'stock' => $stock]);
    }
}
