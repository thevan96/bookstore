<?php

namespace App\Http\Controllers;

use App\Book;
use App\Publisher;
use App\Genre;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'data' => Book::all()
            ]);
        }
        return view('admin.books');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $publishers = Publisher::all();
        return view('admin.createBook', compact('genres', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'genre_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required',
            'available_quantity' => 'required',
            'publication_date' => 'required',
            'price' => 'required',
            'sale' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/books/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $process = Book::create($request->all());
        if ($process) {
            Session::flash('success', 'Tạo sách mới thành công');
        }

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'author' => 'required',
            'genre_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required',
            'available_quantity' => 'required',
            'publication_date' => 'required',
            'price' => 'required',
            'sale' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/books/create')
                ->withErrors($validator)
                ->withInput($request->all());
        }

        $process = Book::create($request->all());
        if ($process) {
            Session::flash('success', 'Tạo sách mới thành công');
        }

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            $book = Book::findOrFail($id);
            $process = $book->delete();

            if ($process) {
                return response()->json([
                    'success' => 'Xóa sách thành công'
                ]);
            }
            return response()->json(['error' => 'Lỗi xóa sách']);
        }
    }
}
