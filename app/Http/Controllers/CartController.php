<?php

namespace App\Http\Controllers;

use App\Book;
use App\Order;
use App\User;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($id, Request $request)
    {
        if ($request->ajax()) {
            $book = Book::findOrFail($id);

            if (!$this->checkExist($id)) {
                Cart::add( $id, $book->title, 1, $book->price, 0,
                    [
                        'image' => $book->image,
                        'available_quantity' => $book->available_quantity
                    ]
                );
            } else {
                return response()->json(
                    [
                        'success' => $book
                    ],
                    200
                );
            }
            return response()->json(
                [
                    'success' => 'Đã thêm vào giỏ hàng'
                ],
                200
            );
        }
    }

    public function checkExist($id)
    {
        foreach (Cart::content() as $cart) {
            if ($cart->id === $id) {
                return true;
            }
        }
        return false;
    }

    public function removeCart($rowId, Request $request)
    {
        if ($request->ajax()) {
            Cart::remove($rowId);
            return response()->json(
                [
                    'success' => 'Đã xóa ra khỏi giỏ hàng'
                ],
                200
            );
        }
    }

    public function initCart(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'quantity' => Cart::count(),
                'total' => Cart::total(),
                'listCart' => Cart::content()
            ]);
        }
    }

    public function update($rowId, Request $request)
    {
        if($request->ajax()) {
            Cart::update($rowId, $request->input('quantity'));
            return response()->json([
                'quantity' => Cart::count(),
                'total' => Cart::total(),
                'listCart' => Cart::content()
            ], 200);
        }
    }

    public function checkout()
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
            return redirect()
                ->route('cart.checkout')
                ->withErrors($validator)
                ->withInput($input);
        }

        if (Auth::attempt($input)) {
            return redirect()->route('cart.checkout');
        }

        return redirect()
            ->route('cart.checkout')
            ->with('login-fail', 'Đăng nhập thông tin không thành công');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $isCreateAccount = $request->has('create-account');
        if ($isCreateAccount) {
            $validator = validator::make($input, [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email-account' => 'required',
                'password-account' => 'required',
                'repeat-password-account' =>
                    'required_with:password-account|same:password-account'
            ]);
        } else {
            $validator = validator::make($input, [
                'name' => 'required',
                'address' => 'required',
                'phone' => 'required',
                'email-account' => 'required'
            ]);
        }

        if ($validator->fails()) {
            return redirect('cart/checkout')
                ->withErrors($validator)
                ->withInput($input);
        }

        $order = new Order();
        $order->name = $request->input('name');
        $order->address = $request->input('address');
        $order->notes = $request->input('notes');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email-account');
        $order->status = false;

        if (!$isCreateAccount) {
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
        } else {
            $user = new User();
            $user->name = $input['name'];
            $user->email = $input['email-account'];
            $user->avatar = 'default_avatar';
            $user->phone = $input['phone'];
            $user->password = Hash::make($input['password-account']);
            $user->save();

            auth()->login($user);
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
            Session::flash('success', 'Tạo tài khoản và thêm đơn hàng thành công');
            return redirect()->route('home.index');
        }
    }
}
