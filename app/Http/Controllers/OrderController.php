<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        return view('user.checkout');
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $validator = Validator::make($input, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('order.index')
                ->withErrors($validator)
                ->withInput($input);
        }

        if (Auth::attempt($input)) {
            return redirect()->route('order.index');
        }

        return redirect()->route('order.index')->with('login-fail', 'Đăng nhập thông tin không thành công');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('order/index')
                ->withErrors($validator)
                ->withInput($input);
        }

        $order = new Order();
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->notes = $request->input('notes');
        $order->phone = $request->input('phone');
        $order->status = false;
        $order->email = $request->input('email');

        if (Auth::check()) {
            $order->user_id = Auth::user()->id;
        }
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
