<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayController extends Controller
{
    public function index(Request $request){
        $orderId = $request->query('order_id');
        $total = $request->query('total');
        $order = Order::findorFail($orderId);
        return view('checkout.pay',compact('orderId','total'));
    }
    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        // dd($orderId);
        $order = Order::findorFail($orderId);
        if ($order && $order->status === 'pending') {
            $order->status = 'processing';
            $order->payment_status = 'paid';
            $order->save();
            session()->flash('success', '✅ Payment successful. Your order is now being processed.');
        } else {
            $order->payment_status = 'failed';
            $order->save();
            session()->flash('info', '⚠️ No pending order found or this order was already processed.');
        }
        return redirect()->route('home');
    }
}
