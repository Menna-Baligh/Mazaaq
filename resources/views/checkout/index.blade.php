@extends('layouts.app')

@section('content')
    @section('hero')
        <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
            <div class="container text-center pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                        <li class="breadcrumb-item"><a href="{{ route('cart.index') }}"style="text-decoration: none">Cart</a></li>
                        <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                        <li class="breadcrumb-item"><a href="#"style="text-decoration: none">Checkout</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    @endsection
    <div class="container">
            @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: '🛒 Order Added!',
                        text: '{{ session('success') }}',
                        showCancelButton: true,
                        cancelButtonText: 'Close',
                        icon: 'success',
                        allowOutsideClick: false
                    });
                });
            </script>
            @elseif (session('error'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ session('error') }}',
                        icon: 'error',
                        allowOutsideClick: false
                    });
                });
            </script>
            @endif
                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Reservation</h5>
                        <h1 class="text-white mb-4">Checkout</h1>
                        <form  class="col-md-12" method="POST" action="{{ route('checkout.store') }}">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name" value="{{ old('name') }}">
                                        <label for="name">Your Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email" value="{{ old('email') }}">
                                        <label for="email">Your Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="town" class="form-control @error('town') is-invalid @enderror" id="email" placeholder="Town" value="{{ old('town') }}">
                                        <label for="email">Town</label>
                                        @error('town')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="country" class="form-control @error('country') is-invalid @enderror" id="email" placeholder="Country" value="{{ old('country') }}">
                                        <label for="text">Country</label>
                                        @error('country')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" id="email" placeholder="Zipcode" value="{{ old('zipcode') }}">
                                        <label for="text">Zipcode</label>
                                        @error('zipcode')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="email" placeholder="Phone number" value="{{ old('phone') }}">
                                        <label for="text">Phone number</label>
                                        @error('phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" id="message" style="height: 100px">{{ old('address') }}</textarea>
                                        <label for="message">Address</label>
                                        @error('address')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Order and Pay Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
@endsection
