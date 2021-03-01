@extends('layouts.app')

@section('content')
<div class="container pt-4 pb-4 mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
        {{-- {{dd(Auth::guard('customer')->user()->orders())}} --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                            
                    @foreach ( Auth::guard('customer')->user()->orders as $order)
                        <div class="card mb-3">
                            <div class="card-header">
                                Commande passée le {{ Carbon\Carbon::parse($order->payment_created_at)->format('d/m/Y à H:i')}} d'un montant de <strong>{{ number_format($order->amount,2, ',', ' ') }}</strong>
                            </div>
                            <div class="card-body">
                                <h6>Liste des produits</h6>
                                @foreach (unserialize($order->products) as $product)
                                
                                    <div>Nom du produit: {{ $product[0] }}</div>
                                    <div>Prix: {{ $product[1] }}</div>
                                    <div>Quantité: {{ $product[2] }}</div>
                                    @isset ($product[3])
                                    <div ><img style="width:21% ;" alt="image" src="{{asset('storage/'.$product[3] )}}" alt="Image"> </div>
                                        
                                    @endisset
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection