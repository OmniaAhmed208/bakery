<?php

namespace App\Http\Controllers\Frontend;

use session;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\InformationOrder;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function addToCart(Request $request) // show cart page
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();

        return view('orders.addToCart', compact('cart_items'));
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
        return to_route('orders.addToCart')->with('success', 'Your item added to cart successfully');
    }

    public function deleteCartItem($cartItem)
    {
        Cart::findOrFail($cartItem)->delete();

        return to_route('orders.addToCart')->with('warning', 'Item deleted from cart successfully');
    }

    public function userInformation(Request $request)
    {
        return view('orders.Information');
    }

    public function addUserInformation(Request $request) // store info
    {
        $request->validate([
            // 'user_id' => 'required',
            'phone_number' => ['required','min:11','max:11'],
            'address' => 'required',
            'street' => 'required',
        ]);

        InformationOrder::create([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'street' => $request->street
        ]);

        return to_route('orders.checkout');
    }

    public function checkout(Request $request)
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $user_information = InformationOrder::where('user_id', $user_id)->first() ;
        // dd( $cart_items);

        return view('orders.checkout',compact('cart_items', 'user_information'));
    }

    public function palceOrder(Request $request)
    {
        $user_id = Auth::id();
        $user_information = InformationOrder::where('user_id', $user_id)->first() ;
        $cart_items = Cart::where('user_id', $user_id)->get();

        foreach($cart_items as $item){
            Order::create([
                'user_id' => $user_id,
                'order_phoneNumber' => $user_information->phone_number,
                'order_address' => $user_information->address.' , '.$user_information->street,
                'menu_id' => $item->menu_id,
                'quantity' => $item->quantity,
                'quantity_type' => $item->quantity_type,
                'total_price' => $item->price,
                'status' => 'completed'
            ]);

            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }

        InformationOrder::where('user_id',$user_id)->first()->delete();

        return to_route('thankyou')->with('orderMsg', 'Your order has been completed successfully');
        // return to_route('')->with('orderMsg', 'Your order has been completed successfully');
    }

    public function pendingOrders(Request $request)
    {
        $user_id = Auth::id();

        $pending = DB::table('orders')
                ->where('user_id', $user_id)
                ->where('status', 'pending')
                ->get();

        InformationOrder::where('user_id',$user_id)->first()->delete();

        // dd($pending);
        // return view('orders.pendingOrders', compact('pending'));
        return to_route('orders.addToCart');
    }


}
