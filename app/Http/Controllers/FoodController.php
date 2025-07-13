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
    public function addToCart($id){
        $food = Food::findOrFail($id);
        $cartItem = Cart::where('user_id', auth()->id())
                    ->where('food_id', $food->id)
                    ->first();
        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            Cart::create([
                'user_id' => auth()->id(),
                'food_id' => $food->id,
                'price' => $food->price,
                'quantity' => 1,
            ]);
        }
        session()->flash('success','Food added to cart successfully');
        return redirect(route('foods.show', $food->id));
    }
}
