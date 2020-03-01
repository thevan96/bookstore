<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        return view('user.checkout');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('order')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $order = new Order();
        $order->full_name = $request->input('full_name');
        $order->address = $request->input('address');
        $order->notes = $request->input('notes');
        $order->phone = $request->input('phone');
        $order->status = false;
        $order->email = $request->input('email');
        $order->save();

        foreach (Cart::content() as $cart) {
            $order->books()->attach($cart->id, [
                'quantity' => $cart->qty,
                'price_each' => $cart->qty * $cart->price
            ]);
        }
        Cart::destroy();

        Session::flash('success', 'Thêm đơn hàng thành công');
        return redirect()->route('home.index');
    }
}
