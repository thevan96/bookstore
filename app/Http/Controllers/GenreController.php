<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(['data' => Genre::all()]);
        }
        return view('admin.genres');
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
                'name' => 'required|unique:genres|max:30'
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'warning' => $validator->errors()->all()
                ]);
            }

            $process = Genre::create($request->all());
            if ($process) {
                return response()->json([
                    'success' => 'Tạo danh mục thành công'
                ]);
            }
            return response()->json(['error' => 'Lỗi tạo danh mục']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        return response()->json(['data' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Genre $genre, Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'name' => "required|unique:genres,id|max:30"
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'warning' => $validator->errors()->all()
                ]);
            }

            $process = $genre->update($request->all());
            if ($process) {
                return response()->json([
                    'success' => 'Cập nhật danh mục thành công'
                ]);
            }
            return response()->json(['error' => 'Lỗi cập nhật danh mục']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre, Request $request)
    {
        if ($request->ajax()) {
            $process = $genre->delete();

            if ($process) {
                return response()->json([
                    'success' => 'Xóa danh mục thành công'
                ]);
            }
            return response()->json(['error' => 'Lỗi xóa danh mục']);
        }
    }
}
