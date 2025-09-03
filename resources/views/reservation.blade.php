@extends('layouts.app')

@section('content')
    @section('hero')
        <div class="w-100 py-5 bg-dark hero-header mb-5 px-0">
            <div class="container text-center pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Your Bookings</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a></li>
                        <li class="breadcrumb-item" style="color: rgb(13, 110, 253)">/</li>
                        <li class="breadcrumb-item"><a href="#"style="text-decoration: none">Bookings</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    @endsection
    @if($reservations->isEmpty())
        <div class="container text-center my-5">
            <h2 class="text-muted">You have no bookings yet.</h2>
            <p class="text-muted">Make a reservation to see it here.</p>
        </div>

    @else
    <div class="container">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>People</th>
                    <th>Status</th>
                    <th>Review</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $res)
                    <tr>
                        <td>{{ $res->name }}</td>
                        <td>{{ $res->email }}</td>
                        <td>{{ \Carbon\Carbon::parse($res->reservation_date)->format('d M Y, h:i A') }}</td>
                        <td>{{ $res->people_count }}</td>
                        <td>
                            <span class="badge
                                @if($res->status == 'booked') bg-success
                                @elseif($res->status == 'processing') bg-warning
                                @else bg-secondary
                                @endif">
                                {{ ucfirst($res->status) }}
                            </span>
                        </td>
                        <td>
                            @if($res->status == 'booked')
                                <a href="{{ route('reservation.review', $res->id) }}" class="btn btn-sm btn-success">Review</a>
                            @else
                                <span class="text-muted">Not available</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
@endsection
