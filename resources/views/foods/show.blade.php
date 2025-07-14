@extends('layouts.app')

@section('content')
    @section('hero')
        <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
                <div class="container text-center pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Details</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                            <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                            <li class="breadcrumb-item"><a href="#" style="text-decoration: none">Food Details</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
    @endsection
    <div class="container-xxl py-5">
        <div class="container">
            @if (session('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Success!',
                            text: '{{ session('success') }}',
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonText: 'Go to Cart',
                            cancelButtonText: 'Close',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('cart.index') }}";
                            }
                        });
                    });
                </script>
            @endif
            @if(session('error'))
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        Swal.fire({
                            title: 'Error!',
                            text: '{{ session('error') }}',
                            icon: 'error',
                            showCancelButton: true,
                            confirmButtonText: 'Close',
                            allowOutsideClick: false
                        });
                    });
                </script>
            @endif

            <div class="row g-5 align-items-center">
                <div class="col-md-6 text-center">
                    <img src="{{ asset($food->image) }}"
                            class="img-fluid shadow rounded"
                            style="max-width: 350px; border-radius: 16px; border: 4px solid #f5c518;">
                </div>

                <div class="col-lg-6">
                    <h1 class="mb-3" style="color: #001f3f; font-weight: bold;">
                        {{ $food->name }}
                    </h1>

                    <span class="badge px-3 py-2 mb-3"
                            style="background-color: #f5c518; color: #001f3f; font-size: 15px; border-radius: 8px;">
                        {{ ucfirst($food->category) }}
                    </span>

                    <p class="mb-4" style="color: #444; font-size: 16px;">
                        {{ $food->description }}
                    </p>

                    <div class="d-flex align-items-center border-start border-5 ps-3 mb-4"
                            style="border-color: #f5c518;">
                        <h4 style="color: #001f3f; margin-bottom: 0;">💰 Price: ${{ number_format($food->price, 2) }}</h4>
                    </div>
                    @if($food->stock_quantity == 0)
                        <div class="d-flex align-items-center border-start border-5 ps-3 mb-4"
                                style="border-color: #f5c518;">
                            <h4 style="color: #001f3f; margin-bottom: 0;">🚫 Out of stock</h4>
                        </div>
                    @else
                    <form action="{{ route('cart.store', $food->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn py-3 px-5"
                                style="background-color: #f5c518; color: #001f3f; border-radius: 30px; font-weight: bold;">
                            🛒 Add to Cart
                        </button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
