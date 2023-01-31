<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;
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
        return view('admin.books.create');
    }

    public function store(BookStoreRequest $request)
    {
        $data = $request->validated();
        $book = Book::create($data);
        return redirect(route('books.show'));
    }

    public function show(string $slug)
    {
        $book = Book::where('slug', '=', $slug)->with(['pages', 'publisher'])->firstOrFail();
        $pages = $book->pages->load(['publisher']);
        return view('admin.books.show', [
            'book' => $book,
            'pages' => $pages,
        ]);
    }

    public function edit()
    {
        return view('admin.books.edit');
    }

    public function update(BookUpdateRequest $request, string $slug)
    {
        $data = $request->validated();
        $book = Book::where('slug', $slug)->firstOrFail();
        $book->update($data);
        return redirect(route('book.show'));
    }

    public function destroy(string $slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $book->delete();
        return redirect(route('books.show'));
    }
}
