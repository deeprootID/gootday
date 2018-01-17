<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('backEnd.order.index')->with('orders', $orders);
    }

    public function confirm(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->payment_status = 'Confirmed';
        $orders->save();
        return redirect()->route('order.index');
    }

    public function unconfirm(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->payment_status = 'Unconfirmed';
        $orders->save();
        return redirect()->route('order.index');
    }
}
