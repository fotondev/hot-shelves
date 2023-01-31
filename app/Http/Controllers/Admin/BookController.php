<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{

    public function index()
    {
        return view('admin.books.index', [
            'books' => Book::latest()
                ->filter(request(['search', 'shelf',]))
                ->with('publisher')
                ->get()
        ]);
    }
    public function create()
    {
        # code...
    }

    public function store()
    {
        # code...
    }

    public function show(string $slug)
    {
        $book = Book::where('slug', '=', $slug)->first();
        $pages = $book->pages->load(['publisher']);

        return view('admin.book.show', [
            'book' => $book,
            'pages' => $pages,
        ]);
    }

    public function edit()
    {
        # code...
    }

    public function update()
    {
        # code...
    }

    public function destroy()
    {
        # code...
    }
}
