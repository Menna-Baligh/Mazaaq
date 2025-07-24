<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'reservation_date' => 'required|date',
            'people_count' => 'required|integer|min:1',
            'special_request' => 'nullable|string|max:500',
        ]);
        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'reservation_date' => $request->reservation_date,
            'people_count' => $request->people_count,
            'special_request' => $request->special_request,
        ]);
        return back()->with('success', 'Resservation done successfully.');
    }
}
