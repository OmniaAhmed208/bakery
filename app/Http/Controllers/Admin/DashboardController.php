<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\User;
use App\Models\Order;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all()->count();
        $orders = Order::all()->count();
        $categories = Category::all()->count();
        $menus = Menu::all()->count();
        // dd($menus);
        return view('dashboard', compact('users', 'orders', 'categories', 'menus'));
    }
}
