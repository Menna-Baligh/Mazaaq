<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Review;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $breakfast = Food::where('category', 'breakfast')->get();
        $lunch = Food::where('category', 'lunch')->get();
        $dinner = Food::where('category', 'dinner')->get();
        $reviews = Review::where('rating', '>=', 4)->get();
        return view('home', compact('breakfast', 'lunch', 'dinner','reviews'));
    }
}
