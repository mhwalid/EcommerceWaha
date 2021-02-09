@extends('layouts.app')

@section('extra-meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('extra-js')
<script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')

<div class="container">
    <div class="col-md-12">
        <a href="{{ route('Cart.index') }}" class="btn btn-sm btn-secondary mt-3">Revenir au panier</a>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h4 class="text-center pt-5">Procéder au paiement</h4>
                <form action="{{ route('Checkout.store') }}" method="POST" class="my-4" id="payment-form">
                    @csrf
                    <div id="card-element">
                    <!-- Elements will create input elements here -->
                    </div>
    
                    <!-- We'll put the error messages in this element -->
                    <div id="card-errors" role="alert"></div>
    
                    <button class="btn btn-success btn-block mt-3" id="submit">
                        <i class="fa fa-credit-card" aria-hidden="true"></i> Payer maintenant ({{ $total }}) $
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


@section('js-extra-stripe')
    <script>
        var stripe = Stripe('pk_test_51ICRVlKY2kJe9mdGXBmi0O5DVQp7nsqAeZIl2s0Y3ZWzApcMPbLCpJG4CW71cySCmLUCABQ5mzZol4TKE4LjrlBu00yNvOvzu4');
        var elements = stripe.elements();

        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                    displayError.classList.add('alert','alert-warning');
                    displayError.textContent = event.error.message;
                } else {
                    displayError.classList.remove('alert','alert-warning');
                    displayError.textContent = '';
                }
            });

            var submit = document.getElementById('submit');
            submit.addEventListener('click', function(event) {
            // We don't want to let default form submission happen here,
            // which would refresh the page.
                event.preventDefault();
                submit.disabled=true;
                stripe.confirmCardPayment("{{$clientSecret}}", {
                    payment_method: {
                        card: card,
                       
                    }
                }).then(function(result){
                    if(result.error){
                        submit.disabled=false;
                        console.log(result.error.message);
                    }else{
                        if(result.paymentIntent.status=='succeeded'){
                                var paymentIntent=result.paymentIntent;
                                var token= document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                                var form = document.getElementById('payment-form');
                                var url= form.action;
                                

                                fetch(
                                    url,
                                    {
                                        headers:{
                                            "Content-Type":"application/json",
                                            "Accept":"application/json, text-plin, */*",
                                            "X-Requested-With":"XMLHttpRequest",
                                            "X-CSRF-TOKEN": token
                                        },
                                        method:'post',
                                        body:JSON.stringify({
                                            paymentIntent:paymentIntent
                                        })
                                    }
                                ).then((data)=>{
                                    if(data.status==400){
                                        var redirect ='/';
                                    }else{
                                        var redirect ='/merci';
                                    }
                                    // console.log(data)
                                    window.location.href=redirect;
                                }).catch((error)=>{
                                    console.log(error)
                                })
                        }
                    }
                });
            });
    </script>
@endsection