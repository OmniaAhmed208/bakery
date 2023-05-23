<?php

namespace App\Http\Controllers\Frontend;

use session;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Table;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
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
    {
        return view('reservations.information');
    }

    public function checkout(Request $request)
    {
        return view('reservations.checkout');
    }

    // ==================== for reservation a table in restaurant

    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();
        return view('reservations.step-one', compact('reservation','min_date','max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'fname' => ['required'],
            'lname' => ['required'],
            'email' => ['required', 'email'],
            'tel_number' => ['required'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'guest_number' => ['required'],
        ]);

        if(empty($request->session()->get('reservation'))){
            $reservation = new Reservation();
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }
        else{
            $reservation = $request->session()->get('reservation');
            $reservation->fill($validated);
            $request->session()->put('reservation', $reservation);
        }
        return to_route('reservations.step.two');
    }

    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');
        $res_table_ids = Reservation::orderBy('res_date')->get()->filter(function($value) use($reservation){
            return $value->res_date == $reservation->res_date;
        })->pluck('table_id');
        $tables = Table::where('status','available')
        ->where('guest_number', '>=', $reservation->guest_number)
        ->whereNotIn('id',$res_table_ids)->get();
        return view('reservations.step-two', compact('reservation','tables'));
    }

    public function storeStepTwo(Request $request)
    {
        $validated = $request->validate([
            'table_id' => ['required']
        ]);

        $reservation = $request->session()->get('reservation');
        $reservation->fill($validated);
        $reservation->save();
        $request->session()->forget('reservation');

        return to_route('thankyou');
    }
}
