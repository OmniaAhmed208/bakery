<?php

namespace App\Http\Controllers\Frontend;

use session;
use Carbon\Carbon;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart(Request $request) // show cart page
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get(); 
        
        return view('reservations.addToCart', compact('cart_items'));
    }
    
    public function addMenuToCart(Request $request) //add 1 menu to cart page
    {
        $menu_price = $request->price;
        $quantity = $request->quantity;
        $allPrice = $menu_price * $quantity;

        Cart::insert([
            'menu_id'=> $request->menu_id,
            'user_id'=> Auth::id(),
            'quantity'=> $request->quantity,
            'price'=> $allPrice,
        ]);
        return to_route('reservations.addToCart')->with('success', 'Your item added to cart successfully');
    }

    public function deleteCartItem($cartItem)
    {
        Cart::findOrFail($cartItem)->delete();

        return to_route('reservations.addToCart')->with('warning', 'Item deleted from cart successfully');
    }
    
    public function userInformation(Request $request)
    {}
    
    public function checkout(Request $request)
    {
        return view('reservations.checkout');
    }


}
