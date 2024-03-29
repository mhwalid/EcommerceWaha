@extends('layouts.app')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('css')
@toastr_css
@endsection

@section('content')


<div class="bg-light py-3">
    <div class="container pt-4 pb-4 mt-4 mb-4">
      <div class="row">
        <div class="col-md-12 mb-0">
          <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> 
          <strong class="text-black">Cart</strong>
        </div>
      </div>
    </div>
  </div>
  @if (Cart::count()>0)
  <div class="site-section">
    <div class="container">
    <div class="row mb-5">
        {{-- <form class="col-md-12" method="post"> --}}
            <div class="col-md-12">
        <div class="site-blocks-table">
            <table class="table table-bordered">
            <thead>
                <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
                <th class="product-remove">Remove</th>
                </tr>
            </thead>
            <tbody style='color: lightgreen'>
                
                @foreach (Cart::content() as $product)
                <tr {{ ($product->model->order) ? 'style=background-color:lightgreen':'' }} >
                    <td class="product-thumbnail" >
                    <img src="{{URL::asset('storage/'.$product->model->photo_principale)}}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                    <h2 class="h5 text-black">{{$product->name}}</h2>
                    </td>
                    <td>{{  number_format($product->model->price,2,',','')}}</td>
                    <td>
                    <div class=" mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend" style="">
                            <select class="custom-select" name="qty" id="qty" data-id="{{ $product->rowId }}" data-stock="{{$product->model->in_stock}}">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" {{ $product->qty == $i ? 'selected' : ''}}>
                                        {{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
    
                    </td>
                    <td>{{$product->subtotal()}}</td>
                    <td> <form method="post" action="{{route('Cart.destroy' , [$product->rowId])}}" >
                        @csrf
                        @method('DELETE')
                        
                    <button type="submit" class="btn btn-primary height-auto btn-sm"><i class="icon-trash" ></i></button>

                    </form></td>
                </tr>
                @endforeach
            

            
            </tbody>
            </table>
        </div>
        {{-- </form> --}}
    </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
            <button class="btn btn-primary btn-md btn-block">Update Cart</button>
            </div>
            <div class="col-md-6">
            <button class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button>
            </div>
        </div>
           @if (!request()->session()->has('coupon'))
            <form action="{{route('cart.coupon')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                    <label class="text-black h4" for="coupon">Coupon</label>
                    <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                    <input type="text" class="form-control py-3" name="coupon" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-md px-4">Apply Coupon</button>
                    </div>
                </div>
            </form>
            @else
            <h3> Le coupon  été deja appliqué </h3>
                
           @endif
        </div>
        <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
            <div class="col-md-7">
            <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">{{Cart::subtotal()}}</strong>
                </div>
            </div>
            @if (request()->session()->has('coupon'))
            <div class="row mb-3">
                <div class="col-md-6">
                <span class="text-black">Coupon {{request()->session()->get('coupon')['code']}}</span>
                    <form action="{{route('cart.coupon.destroy')}}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-outline-danger"><i class="icon-trash" ></i> </button>
                    </form>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">{{number_format(request()->session()->get('coupon')['price_off'], 2,',','')}}</strong>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">NV sous-total</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">{{number_format(floatval(implode(explode(',',Cart::subtotal())))  - request()->session()->get('coupon')['price_off'], 2,',','')}}</strong>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">Tax</span>
                </div>
                <div class="col-md-6 text-right">
                 <strong class="text-black">{{number_format((floatval(implode(explode(',',Cart::subtotal()))) - request()->session()->get('coupon')['price_off'])*(config('cart.tax')/100) , 2,',','')}}</strong>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                {{-- <strong class="text-black">{{number_format(floatval(implode(explode(',',Cart::subtotal()))) - request()->session()->get('coupon')['price_off']+(Cart::subtotal() - request()->session()->get('coupon')['price_off'])*(config('cart.tax')/100), 2,',','')}}</strong> --}}
                <strong class="text-black">{{number_format(floatval(implode(explode(',',Cart::subtotal()))) - request()->session()->get('coupon')['price_off']+(floatval(implode(explode(',',Cart::subtotal()))) - request()->session()->get('coupon')['price_off'])*(config('cart.tax')/100), 2,',','')}}</strong>
                </div>
            </div>
            @else
            <div class="row mb-5">
                <div class="col-md-6">
                <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">
                <strong class="text-black">{{Cart::total()}}</strong>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                <a href="{{route('Checkout.index')}}" class="btn btn-primary btn-lg btn-block" onclick="window.location='checkout.html'">Proceed To
                    Checkout </a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
  @else
    <p>Votre panier et vider</p>
  @endif
    

@endsection

@section('js-extra-stripe')
    <script>
        var selectors= document.querySelectorAll('#qty');
        var button = document.querySelectorAll('.ww')
            Array.from(selectors).forEach((element)=>{
               
                element.addEventListener('change', function () {
                    var rowId = element.getAttribute('data-id');
                    var stock = element.getAttribute('data-stock');
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    fetch(`panier/${rowId}`,
                        {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            method: 'PATCH',
                            body: JSON.stringify({
                                qty: this.value,
                                stock: stock
                            })
                    }).then((data) => {
                        console.log(data);
                        location.reload();
                    }).catch((error) => {
                        console.log(error);
                    });
                });
            });
    </script>
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection