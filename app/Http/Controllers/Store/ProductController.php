<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return dd(Product::find(32));
        $products = DB::table('Products')->orderBy('updated_at', 'desc')->limit(6)->get();
        $products1 = DB::table('Products')->where('range', '=', '2')->limit(6)->get();
        $newproduct = Product::orderBy('created_at', 'desc')->limit(4)->get();
        return view('Shop.index', compact(['products', 'products1', 'newproduct']));
    }

    public function stor()
    {
        if (request()->categorie) {
            $products = Product::with('category')->whereHas('category', function ($query) {
                $query->where('slug', request()->categorie);
            })->orderBy('created_at', 'DESC')->paginate(16);
        } else {
            $products = Product::with('category')->orderBy('created_at', 'DESC')->paginate(15);
        }

        return view('Shop.store', compact('products'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $stock = $product->in_stock == 0 ? 'Indisponible' : 'Disponible';


        return view('Shop.show', ['product' => $product, 'stock' => $stock]);
    }

    public function about()
    {
        return view('Shop.about');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function search()
    {
        request()->validate([
            'search' => 'required|min:3'
        ]);


        $search = request()->input('search');

        $products = Product::where('name', 'like', "%$search%")
            ->orwhere('description', 'like', "%$search%")->paginate(15);

        return view('Shop.store', compact('products'));
    }

    public function contact()
    {
        return view('Shop.contact');
    }
}
