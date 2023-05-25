<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        // $pending = DB::table('orders')
        //         ->where('user_id', $user_id)
        //         ->where('status', 'pending')
        //         ->get();
        $orders = Order::all();
        // dd($orders);
        return view('admin.orders.index',[
            'orders' => $orders
        ]);
    }
}
