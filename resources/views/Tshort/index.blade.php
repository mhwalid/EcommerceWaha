@extends('home')
@section('content')
<div class="album py-5 bg-light">
    <div class="container">
            @foreach ($produits as $produit)
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                    <img  src="produits/star_trek_kirk.jp" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <p class="card-text">{{$produit->name}} <br>{{$produit->description}} </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price">{{'produits/'.$produit->photo_principale}} €</span>
                                <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                            </div>
                        </div>
                    </div>
                </div>        
            </div>
            @endforeach
        
    </div>
</div> 
@endsection