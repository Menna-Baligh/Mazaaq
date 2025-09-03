@extends('layouts.app')
@section('content')

@section('hero')
        <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
            <div class="container text-center pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Contact Us</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                        <li class="breadcrumb-item"><a href=""style="text-decoration: none">Contact Us</a></li>
                    </ol>
                </nav>
            </div>
        </div>
@endsection
<script>
    @if (session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonColor: '#3085d6'
        });
    @endif
</script>
    <div class="container-xxl py-5">
        <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-primary fw-normal">Contact Us</h5>
            <h1 class="mb-5">Contact For Any Query</h1>
        </div>

        <div class="row g-4 mb-5 justify-content-center text-center">
            <div class="col-md-4">
                <h5 class="section-title ff-secondary fw-normal text-primary">Booking</h5>
                <p><i class="fa fa-envelope-open text-primary me-2"></i>book@example.com</p>
            </div>
            <div class="col-md-4">
                <h5 class="section-title ff-secondary fw-normal text-primary">General</h5>
                <p><i class="fa fa-envelope-open text-primary me-2"></i>info@example.com</p>
            </div>
            <div class="col-md-4">
                <h5 class="section-title ff-secondary fw-normal text-primary">Technical</h5>
                <p><i class="fa fa-envelope-open text-primary me-2"></i>tech@example.com</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 wow fadeIn" data-wow-delay="0.1s">
                <iframe class="position-relative rounded w-100 h-100"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001156.4288297426!2d-78.01371936852176!3d42.72876761954724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4ccc4bf0f123a5a9%3A0xddcfc6c1de189567!2sNew%20York%2C%20USA!5e0!3m2!1sen!2sbd!4v1603794290143!5m2!1sen!2sbd"
                    frameborder="0" style="min-height: 350px; border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>

            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="name" placeholder="Your Name" value="{{ old('name') }}">
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
                                    <input type="email" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="Your Email" value="{{ old('email') }}">
                                    <label for="email">Your Email</label>
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <select class="form-select  @error('to') is-invalid @enderror" id="to" name="to" aria-label="Select recipient">
                                        <option value="book@example.com" @selected(old('to') == 'book@example.com')>Booking</option>
                                        <option value="info@example.com" @selected(old('to') == 'info@example.com')>General</option>
                                        <option value="tech@example.com" @selected(old('to') == 'tech@example.com')>Technical</option>
                                    </select>
                                    <label for="to">Send To</label>
                                    @error('to')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control  @error('subject') is-invalid @enderror" id="subject" name="subject" placeholder="Subject" value="{{ old('subject') }}">
                                    <label for="subject">Subject</label>
                                    @error('subject')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <textarea class="form-control  @error('message') is-invalid @enderror" placeholder="Leave a message here" id="message" name="message" style="height: 150px">{{ old('message') }}</textarea>
                                    <label for="message">Message</label>
                                    @error('message')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
