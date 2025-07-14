<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        return view('checkout.index');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|min:7|max:20',
            'address' => 'required|string|max:255',
            'town' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'zipcode' => 'required|string|max:20'
        ]);
        $cartItems = Cart::where('user_id', Auth::user()->id)->get();
        if($cartItems->isEmpty()){
            return back()->with('error', 'Your cart is empty.');
        }
        DB::beginTransaction();
        try{
            $total = 0 ;
            foreach($cartItems as $item){
                $total += $item->price * $item->quantity;
            }
            $order =Order::create([
                'user_id' => Auth::user()->id,
                'total' => $total,
                'status' => 'pending',
                'shipping_name' => $request->name,
                'shipping_email' => $request->email,
                'shipping_phone' => $request->phone,
                'shipping_address' => $request->address,
                'shipping_town' => $request->town,
                'shipping_country' => $request->country,
                'shipping_zip' => $request->zipcode,
            ]);
            foreach($cartItems as $item){
                $food = Food::findOrFail($item->food_id);
                if($food->stock_quantity < $item->quantity){
                    DB::rollBack();
                    return back()->with('error', $food->name.' Out of stock');
                }
                OrderDetail::create([
                    'order_id' => $order->id,
                    'food_id' => $item->food_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price
                ]);
                $food->stock_quantity -= $item->quantity;
                $food->save();
            }
            Cart::where('user_id', Auth::user()->id)->delete();
            DB::commit();
            return redirect()->route('checkout.index')->with('success', 'Order placed successfully');
        }catch(\Exception $e){
            DB::rollBack();
            return back()->with('error', 'Something went wrong please try again');
        }

    }
}
