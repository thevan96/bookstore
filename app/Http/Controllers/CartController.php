<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function addToCart($id, Request $request)
    {
        if ($request->ajax()) {
            $book = Book::findOrFail($id);

            if (!$this->checkExist($id)) {
                Cart::add(
                    $id,
                    $book->title,
                    1,
                    $book->price,
                    $book->available_quantity
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

    public function carts()
    {
        return view('user.carts');
    }
}
