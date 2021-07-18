@extends('layouts.app')

@section('content')
    <div class="site-section">
        <div class="container">
          <div class="badge badge-pill badge-info"> <h6 style="margin-bottom: 0px;">{{$stock}}</h6></div>
          <div class="row">
            
            <div class="col-md-5 mr-auto">
              <div class="border text-center">
                <img src="{{URL::asset('storage/'.$product->photo_principale)}}" alt="Image" class="img-fluid p-5">
              </div>
            </div>
            <div class="col-md-6">
              <h2 class="text-black">{{$product->name}} </h2>
              {{dd($product->Order)}}
              @if($product->order)

              <h5><em style="color: lightcoral">ce medicament est sous une ordonnance</em></h5>
              @endif 
              <p>{!!$product->description!!} .</p>
              

              <p><del>{{$product->price -7}}€ </del>  <strong class="text-primary h4">{{$product->price}}€ </strong></p>

              
             @if ($stock=="Disponible")
             <form action="{{route('Cart.store')}}" method="POST">
              <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 220px;">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                  </div>
                  <input type="text" class="form-control text-center" name="q" id="q" value="1" placeholder=""
                    aria-label="Example text with button addon" aria-describedby="button-addon1">
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                  </div>
                </div>
      
              </div>

              <p>
                <h4>Quantité disponible <strong > {{$product->in_stock}} </strong></h4>
                  @csrf
                  <input type="hidden" name="id" value="{{$product->id}}" id="">
                  <button  type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button></p>
               
                </form>
             @endif

              <div class="mt-5">
                <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                      aria-controls="pills-home" aria-selected="true">Ordering Information</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                      aria-controls="pills-profile" aria-selected="false">Specifications</a>
                  </li>
              
                </ul>
                <div class="tab-content" id="pills-tabContent">
                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <table class="table custom-table">
                      <thead>
                        <th>Material</th>
                        <th>Description</th>
                        <th>Packaging</th>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">OTC022401</th>
                          <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                          <td>1 BT</td>
                        </tr>
                        <tr>
                          <th scope="row">OTC022401</th>
                          <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                          <td>144/CS</td>
                        </tr>
                        <tr>
                          <th scope="row">OTC022401</th>
                          <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                          <td>1 EA</td>
                        </tr>
                        
                      </tbody>
                    </table>
                  </div>
                  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              
                    <table class="table custom-table">
              
                      <tbody>
                        <tr>
                          <td>HPIS CODE</td>
                          <td class="bg-light">999_200_40_0</td>
                        </tr>
                        <tr>
                          <td>HEALTHCARE PROVIDERS ONLY</td>
                          <td class="bg-light">No</td>
                        </tr>
                        <tr>
                          <td>LATEX FREE</td>
                          <td class="bg-light">Yes, No</td>
                        </tr>
                        <tr>
                          <td>MEDICATION ROUTE</td>
                          <td class="bg-light">Topical</td>
                        </tr>
                      </tbody>
                    </table>
              
                  </div>
              
                </div>
              </div>

      
            </div>
          </div>
        </div>
    </div>
@endsection