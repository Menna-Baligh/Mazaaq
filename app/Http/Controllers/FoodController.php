<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function show($id){
        $food = Food::findOrFail($id);
        return view('foods.show', compact('food'));
    }
    
}
