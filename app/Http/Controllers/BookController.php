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
            $books = Book::all();
            $books->makeHidden(['image']);
            return response()->json([
                'data' => $books
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

        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => 'required',
            'author' => 'required',
            'genre_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required',
            'image' => 'required',
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

        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $input['image'] = 'data:image/png;base64,'.$image;
        }

        $process = Book::create($input);
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
        $genres = Genre::all();
        $publishers= Publisher::all();
        $book = Book::findOrFail($id);
        return view('admin.updateBook',compact('book', 'genres', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Book $book, Request $request)
    {
        $input = $request->all();

        if (!$request->hasFile('image')) {
            $input['image'] = $book->image;
        }

        $validator = Validator::make($input, [
            'title' => 'required',
            'author' => 'required',
            'genre_id' => 'required',
            'publisher_id' => 'required',
            'description' => 'required',
            'image' => 'required',
            'available_quantity' => 'required',
            'publication_date' => 'required',
            'price' => 'required',
            'sale' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect("admin/books/$book->id/edit")
                ->withErrors($validator)
                ->withInput($request->all());
        }

        if ($request->hasFile('image')) {
            $image = base64_encode(file_get_contents($request->file('image')));
            $input['image'] = 'data:image/png;base64,'.$image;
        }

        $process =  $book->update($input);
        if ($process) {
            Session::flash('success', 'Cập nhật sách thành công');
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
