<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $genres = Genre::with('books')->get();
        $books = Book::where('available_quantity', '>', '0')->paginate(9);
        return view('user.home', compact('genres', 'books'));
    }

    public function genre($id)
    {
        $genres = Genre::with('books')->get();
        $books = Genre::findOrFail($id)
            ->books()
            ->where('available_quantity', '>', '0')
            ->paginate(9);
        return view('user.home', compact('genres', 'books'));
    }

    public function search(Request $request)
    {
        $genres = Genre::with('books')->get();

        $keyword = $request->input('keyword');

        $books = Book::where('title', 'like', '%' . $keyword . '%')
            ->orwhere('author', 'like', '%'.$keyword.'%')
            ->paginate(9);
        return view('user.home', compact('genres', 'books'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $genre = $book->genre;
        return view('user.bookDetail', compact('book', 'genre'));
    }

    public function cart()
    {
        return view('user.listCart');
    }
}
