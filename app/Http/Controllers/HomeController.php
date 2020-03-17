<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'paginate' => Book::paginate(6)
            ]);
        }

        $genres = Genre::withCount('books')->get();
        $total = count(Book::all());
        return view('user.home', compact('genres', 'total'));
    }

    public function genre($id, Request $request)
    {
        $books = Genre::findOrFail($id)
            ->books()
            ->where('available_quantity', '>', '0')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        if ($request->ajax()) {
            return response()->json(['paginate' => $books]);
        }
    }

    public function search(Request $request)
    {
        $keyword = $request->input('value');

        if ($request->ajax()) {
            $books = Book::where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('author', 'LIKE', "%{$keyword}%")
                ->orderBy('created_at', 'desc')
                ->paginate(6);
            return response()->json(['paginate' => $books]);
        }
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        $genre = $book->genre;
        return view('user.bookDetail', compact('book', 'genre'));
    }

    public function carts()
    {
        return view('user.listCart');
    }
}
