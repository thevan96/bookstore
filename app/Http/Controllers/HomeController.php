<?php

namespace App\Http\Controllers;

use App\Book;
use App\Genre;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($idCategory = 0, Request $request)
    {
        $books = $this->filter($idCategory);
        $genres = Genre::withCount('books')->get();
        $total = count(Book::all());

        return view('user.home', compact('genres', 'books', 'total'));
    }

    public function genre($id)
    {
        $total = count(Book::all());
        $genres = Genre::with('books')->get();
        $books = Genre::findOrFail($id)
            ->books()
            ->where('available_quantity', '>', '0')
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        return view('user.home', compact('genres', 'books', 'total'));
    }

    public function search(Request $request)
    {
        $total = count(Book::all());
        $genres = Genre::with('books')->get();
        $keyword = $request->input('keyword');

        $books = Book::where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('author', 'LIKE', "%{$keyword}%")
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('user.home', compact('genres', 'books', 'total'));
    }

    public function filter($idCategory)
    {
        if (intval($idCategory) === 0) {
            return Book::where('available_quantity', '>', '0')
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        } else {
            return Genre::findOrFail($idCategory)
                ->books()
                ->where('available_quantity', '>', '0')
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        }
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
