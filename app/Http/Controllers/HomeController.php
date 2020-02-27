<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($idCategory = 0, Request $request)
    {
        $books = $this->filter($idCategory);
        $genres = Genre::withCount('books')->get();
        $totalBook = Book::count();
        return view('user.home', compact('genres', 'totalBook', 'books'));
    }

    public function search(Request $request)
    {
        $genres = Genre::withCount('books')->get();
        $totalBook = Book::count();

        $keyword = $request->input('keyword');
        $books = Book::where('title', 'LIKE', "%{$keyword}%")
            ->orWhere('author', 'LIKE', "%{$keyword}%")
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('user.home', compact('genres', 'totalBook', 'books'));
    }

    public function filter($idCategory)
    {
        if (intval($idCategory) === 0) {
            return Book::where('available_quantity', '>', '0')->paginate(9);
        } else {
            return Genre::findOrFail($idCategory)
                ->books()
                ->where('available_quantity', '>', '0')
                ->paginate(9);
        }
    }

    public function bookDetail($id)
    {
        $book = Book::findOrFail($id);
        return view('user.bookDetail', [
            'book' => $book,
            'genre' => $book->genre
        ]);
    }
}
