<?php

namespace App\Http\Controllers;

use App\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(
                ['data' => Publisher::all()]
            );
        }
        return view('admin.publishers');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            // Validator
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:publishers|max:30',
                'address' => 'required',
                'phone' => 'required|unique:publishers',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'warning' => $validator->errors()->all(),
                ]);
            }

            $process = Publisher::create($request->all());
            if ($process) {
                return response()->json([
                    'success' => 'Tạo mục nhà xuất bản thành công',
                ]);
            }
            return response()->json(['error' => 'Lỗi tạo mục nhà xuất bản']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(publisher $publisher)
    {
        return response()->json(['data' => $publisher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, publisher $publisher)
    {
        if ($request->ajax()) {

            // Validator
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:publishers|max:30',
                'address' => 'required',
                'phone' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'warning' => $validator->errors(),
                ]);
            }

            $process = $publisher->update($request->all());
            if ($process) {
                return response()->json([
                    'success' => 'Cập nhật nhà xuất bản thành công',
                ]);
            }
            return response()->json(['error' => 'Lỗi cập nhật nhà xuất bản']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(publisher $publisher, Request $request)
    {
        if ($request->ajax()) {
            $process = $publisher->delete();

            if ($process) {
                return response()->json([
                    'success' => 'Xóa nhà xuất bản thành công',
                ]);
            }
            return response()->json(['error' => 'Lỗi xóa nhà xuất bản']);
        }
    }
}
