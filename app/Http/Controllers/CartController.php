<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())
                    ->with('food')->get();
        return view('cart.index', compact('cartItems'));
    }
    public function store($id){
        $food = Food::findOrFail($id);
        $cartItem = Cart::where('user_id', auth()->id())
                    ->where('food_id', $food->id)
                    ->first();
        if($food->stock_quantity < 1){
            session()->flash('error','Out of stock');
            return redirect(route('foods.show', $food->id));
        }
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
    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        if ($cartItem->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        if ($request->action === 'increase') {
            if ($cartItem->quantity < $cartItem->food->stock_quantity) {
                $cartItem->quantity += 1;
            }else{
                session()->flash('error','cannot add more');
                return redirect()->back();
            }
        }elseif ($request->action === 'decrease') {
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
            }else{
                session()->flash('error','cannot remove more');
                return redirect()->back();
            }
        }
        $cartItem->save();
        return redirect()->back();
    }
    public function delete($id)
    {
        $cartItem = Cart::findOrFail($id);
        if ($cartItem->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }
        $cartItem->delete();
        return redirect()->back();
    }
}
