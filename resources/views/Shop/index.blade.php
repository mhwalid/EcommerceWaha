
@extends('layouts.app')

@section('content')
  @include('includes.first')

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase">Popular Products</h2>
        </div>
      </div>

      <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <span class="tag">Sale</span>
          <a href="shop-single.html"> <img src="assets/images/product_01.png" alt="Image"></a>
          <h3 class="text-dark"><a href="shop-single.html">Bioderma</a></h3>
          <p class="price"><del>95.00</del> &mdash; $55.00</p>
        </div>
        @endforeach
        
        
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="shop.html" class="btn btn-primary px-4 py-3">View All Products</a>
        </div>
      </div>
    </div>
  </div>

  
  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase">New Products</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 block-3 products-wrap">
          <div class="nonloop-block-3 owl-carousel">

            @foreach ($products1 as $product)
            <div class="text-center item mb-4">
              <a href="shop-single.html"> <img src="assets/images/product_03.png" alt="Image"></a>
              <h3 class="text-dark"><a href="shop-single.html">Umcka Cold Care</a></h3>
              <p class="price">$120.00</p>
            </div>
            @endforeach
           

          </div>
        </div>
      </div>
    </div>
  </div>

  

  @include('includes.comments')
@endsection