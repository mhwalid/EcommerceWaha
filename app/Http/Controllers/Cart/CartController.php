<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Model\Coupon;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Cart::content());
        if (Cart::count() > 0) {
            return view('Cart.index');
        }
        return redirect()->route('Shop.store');
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
    public function store(Request $rq)
    {
        // return dd(Cart::content());
        $duplicata = Cart::search(function ($cartItem, $rowId) use ($rq) {
            return $cartItem->id == $rq->id;
        });

        if ($duplicata->isNotEmpty()) {
            toastr()->warning('le produit a déja été ajouté au panier');
            return redirect()->route('Shop.store');
        }
        $product = Product::find($rq->id);
        Cart::add($product->id, $product->name, $rq->q, $product->price)->associate('App\Model\Product');
        toastr()->success('le produit a bien été Rajouté au panier');
        return redirect()->route('Shop.store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $rowId)
    {

        $data = $request->json()->all();

        $validates = Validator::make($request->all(), [
            'qty' => 'numeric|required|between:1,5',
        ]);

        if ($validates->fails()) {
            // Session::flash('error', 'La quantité doit est comprise entre 1 et 5.');
            // return response()->json(['error' => 'Cart Quantity Has Not Been Updated']);
            toastr()->warning('La quantité doit est comprise entre 1 et 5.');
        }
        if ($data['qty'] > $data['stock']) {
            // Session::flash('error', 'Il n\'y a plus assez de stock');
            // return response()->json(['error' => 'Cart Quantity is not avilabile']);
            toastr()->error('Il n\'y a plus assez de stock');
        }

        Cart::update($rowId, $data['qty']);

        //Session::flash('success', 'La quantité du produit est passée à ' . $data['qty'] . '.');
        // return response()->json(['success' => 'Cart Quantity Has Been Updated']);
        toastr()->success('La quantité a bien ete modifié ' . $data['qty']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        //return dd($rowId);

        Cart::remove($rowId);
        toastr()->success('le produit a bien été supprime du panier');
        return redirect()->route('Cart.index');
    }


    public function customerOrders()
    {
        return view('Customer.home');
    }

    public function storcoupon(Request $rq)
    {

        $code = $rq->get('coupon');

        $coupon = Coupon::where('code', $code)->first();

        if (!$coupon) {
            toastr()->error('le coupon est invalider');
            return redirect()->back();
        }

        $rq->session()->put('coupon', [
            'code' => $coupon->code,
            'price_off' => $coupon->discount(Cart::subtotal())
        ]);
        toastr()->success('le coupon est valider');
        return redirect()->back();
    }

    public function destroycoupon()
    {
        request()->session()->forget('coupon');
        toastr()->warning('le coupon a bien été désactiver');
        return redirect()->back();
    }
}
