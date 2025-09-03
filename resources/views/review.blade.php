@extends('layouts.app')

@section('content')
@section('hero')
<div class="bg-white p-0 m-0">
    <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
        <div class="container text-center pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Write a Review</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                    <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                    <li class="breadcrumb-item"><a href="#" style="text-decoration: none">Review</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
@endsection

<div class="container">
    <div class="col-md-12 bg-dark">
        <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Review</h5>
            <h1 class="text-white mb-4">Share your experience</h1>
            <form method="POST" action="{{ route('reservation.review.store',$reservation->id) }}" class="col-md-12">
                @csrf
                <div class="row g-3">
                    <div class="">
                        <div class="form-floating">
                            <select id="rating" name="rating" class="form-control @error('rating') is-invalid @enderror" required>
                                <option value="">Select rating</option>
                                @for ($i = 1; $i <= 5; $i++)
                                    <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                                @endfor
                            </select>
                            <label for="rating">Rating</label>
                            @error('rating')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="">
                        <div class="form-floating">
                            <textarea id="comment" name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="Write your review here..." style="height: 150px">{{ old('comment') }}</textarea>
                            <label for="comment">Your Review</label>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-primary w-100 py-3" type="submit">Submit Review</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
