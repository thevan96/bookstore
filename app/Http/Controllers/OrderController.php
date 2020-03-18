<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = Order::all();
            return response()->json([
                'data' => $orders
            ]);
        }
        return view('admin.orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Request $request)
    {
        $order_book = [];
        foreach($order->books as $book) {
            $order_book[] = $book->pivot;
        }

        return response()->json([
            'order' => $order,
            'order_book' => $order_book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order, Request $request)
    {
        if($request->ajax()) {
            $order->update(['status' => $request->input('status')]);
            return response()->json([
                'success' => $request->input('status')
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order, Request $request)
    {
        if ($request->ajax()) {
            $order->books()->detach();
            $process = $order->delete();
            if ($process) {
                return response()->json([
                    'success' => 'Xóa đơn hàng thành công'
                ]);
            }
            return response()->json(['error' => 'Lỗi xóa đơn hàng']);
        }
    }
}
