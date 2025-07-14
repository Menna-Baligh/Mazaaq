@extends('layouts.app')

@section('content')
    @section('hero')
        <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
            <div class="container text-center pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Your Cart</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                        <li class="breadcrumb-item"><a href="#"style="text-decoration: none">Cart</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    @endsection
    @if (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('error') }} 😔',
                    icon: 'error',
                    allowOutsideClick: false
                });
            });
        </script>
    @endif
    @if($cartItems->isEmpty())
        <div class="container text-center empty-cart-note py-5">
            <h2 class="text-white">Your cart is empty 😔</h2>
            <p class="lead text-light">Add some items to your cart to proceed.</p>
            <a href="{{ url('/') }}#menu" class="btn btn-warning">Back to Menu</a>
        </div>
    @else
        <div class="container mb-5">
            <div class="card  text-white border-0 shadow-lg p-4 rounded-4">
                <table class="table table-hover text-center align-middle text-white">
                    <thead class="table-dark">
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cartItems as $item)
                            <tr>
                                <td><img src="{{ asset($item->food->image) }}" width="60" height="60" class="rounded-circle"></td>
                                <td>{{ $item->food->name }}</td>
                                <td>${{ number_format($item->price, 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex justify-content-center align-items-center gap-1">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-sm btn-outline-warning" name="action" value="decrease">−</button>
                                        <span class="px-2">{{ $item->quantity }}</span>
                                        <button class="btn btn-sm btn-outline-warning" name="action" value="increase">+</button>
                                    </form>
                                </td>
                                <td>${{ number_format($item->quantity * $item->price, 2) }}</td>
                                <td>
                                    <form action="{{ route('cart.delete', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">🗑 Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="text-end mt-4">
                    <h4 class="text-warning">Total: ${{ $cartItems->sum(fn($item) => $item->price * $item->quantity)}}</h4>
                    <a href="" class="btn btn-warning px-5 py-2 fw-bold mt-2">Proceed to Checkout</a>
                </div>
            </div>
        </div>
    @endif
@endsection
