@extends('layouts.app')

@section('content')
    @section('hero')
        <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
            <div class="container text-center pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Your Orders</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                        <li class="breadcrumb-item"><a href="#"style="text-decoration: none">Orders</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    @endsection
    @if($orders->isEmpty())
        <div class="container text-center my-5">
            <h2 class="text-muted">You have no Orders yet.</h2>
            <p class="text-muted">Make a Order to see it here.</p>
        </div>
        
    @else
        <div class="container">
            @foreach($orders as $order)
                <div class="card mb-5 shadow-lg border-0 rounded-4 overflow-hidden">
                    <div class="card-header  text-white d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0">Order #{{ $order->id }}</h5>
                            <small>Placed on: {{ $order->created_at->format('d M Y - h:i A') }}</small>
                        </div>
                        <span class="badge fs-6 bg-{{ $order->status === 'delivered' ? 'success' : ($order->status === 'cancelled' ? 'danger' : 'warning') }}">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <div class="card-body bg-light">
                        @foreach($order->details as $item)
                            <div class="row mb-3 p-3 rounded bg-white shadow-sm">
                                <div class="col-md-8">
                                    <h6 class="mb-1 text-dark">{{ $item->food['name'] }}</h6>
                                    <small class="text-muted">Quantity: {{ $item->quantity }}</small>
                                    
                                </div>
                                <div class="col-md-4 text-end">
                                    <span class="fw-bold text-dark">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                </div>
                                
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-between mt-4">
                            <strong>Total:</strong>
                            <strong style="color: #1E202F">${{ number_format($order->details->sum(fn($item) => $item->price * $item->quantity), 2) }}</strong>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <strong>Payment Status:</strong>
                            <span class="badge bg-{{ $order->payment_status === 'paid' ? 'success' : 'danger' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection