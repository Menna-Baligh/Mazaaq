@extends('layouts.app')
@section('content')
    @section('hero')
        <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
            <div class="container text-center pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Pay Now</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                        <li class="breadcrumb-item"><a href="#"style="text-decoration: none">Pay</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    @endsection

    <div class="container" >
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AT21bifv1pm33fZ0TWnZt8T1LAWcDTSEmnlsul2dWysG88aXA8rcrRvF3VID53aypIE_61_wKZl9UpLP&currency=USD"></script>

                    <!-- Set up a container element for the button -->
                    <div class="d-flex justify-content-center my-5">
                        <div id="paypal-button-container"></div>
                    </div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '100' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {

                            window.location.href='{{ route('home') }}';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>

    </div>


@endsection
