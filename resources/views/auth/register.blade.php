@extends('layouts.app')

@section('content')
@section('hero')
<div class="bg-white p-0 m-0">
    <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
        <div class="container text-center pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Registration</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                    <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none">Register</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection


<div class="container">

                <div class="col-md-12 bg-dark">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Register</h5>
                        <h1 class="text-white mb-4">Register for a new user</h1>
                        <form method="POST" action="{{ route('register') }}" class="col-md-12">
                            @csrf
                            <div class="row g-3">
                                <div class="">
                                    <div class="form-floating">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        <label for="name">Name</label>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        <label for="email">Your Email</label>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                        <label for="password">Password</label>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-floating">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <label for="password">Confirm Password</label>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <button class="btn btn-primary w-100 py-3" name="submit" type="submit">{{ __('Register') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

@endsection
