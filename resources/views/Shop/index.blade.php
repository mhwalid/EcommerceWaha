
@extends('layouts.app')

@section('content')
  @include('includes.first')

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase">PRODUITS POPULAIRES</h2>
        </div>
      </div>

      <div class="row">
        @foreach ($products as $product)
        <div class="col-sm-6 col-lg-4 text-center item mb-4">
          <span class="tag">Sale</span>
        <a href="{{route('Shop.show' , $product->id)}}">  <div> <img style="width: 400px ; height: 400px;" src="{{URL::asset('storage/'.$product->photo_principale)}}" alt="Image"></a></div>
          <h3 class="text-dark"><a href="shop-single.html">{{$product->name}}</a></h3>
          <p class="price"><del>{{$product->price +11}}</del> &mdash; {{$product->price}}</p>
        </div>
        @endforeach
        
        
      </div>
      <div class="row mt-5">
        <div class="col-12 text-center">
          <a href="{{route('Shop.store')}}" class="btn btn-primary px-4 py-3">Voir tous les produits</a>
        </div>
      </div>
    </div>
  </div>

  
  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="title-section text-center col-12">
          <h2 class="text-uppercase">NOUVEAUX PRODUITS</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 block-3 products-wrap">
          <div class="nonloop-block-3 owl-carousel">

            @foreach ($newproduct as $product)
            <div class="text-center item mb-4">
              <a href="{{route('Shop.show' , $product->id)}}"> <img src="{{URL::asset('storage/'.$product->photo_principale)}}" alt="Image"></a>
              <h3 class="text-dark"><a href="shop-single.html">{{$product->name}}</a></h3>
              <p class="price">{{$product->price}}</p>
            </div>
            @endforeach
           

          </div>
        </div>
      </div>
    </div>
  </div>

  

  @include('includes.comments')
@endsection