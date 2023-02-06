<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\View\View;
// use App\Services\BookService;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;

class BookController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Show all books
     */
    public function index(): View
    {
        return view('books.index', [
            'books' => Book::latest()
                ->filter(request(['search']))
                ->get()
        ]);
    }

    /**
     * Show create form
     */
    public function create(Shelf $shelf = null): View
    {
        return view('books.create', [
            'shelf' => $shelf
        ]);
    }

    /**
     * Store new book
     */
    public function store(BookStoreRequest $request, Shelf $shelf = null)
    {

        $data = $request->validated();
        $book = Book::create($data);
        if ($shelf !== null) {
            $shelf->addBook($book);
           return to_route('shelf.show', ['shelf' => $shelf]);
        }
        return to_route('book.show', ['book' => $book]);
    }

    /**
     * Show book
     */
    public function show(Book $book): View
    {
        $pages = $book->pages;
        return view('books.show', [
            'book' => $book,
            'pages' => $pages,
        ]);
    }

    /**
     * Show edit form
     */
    public function edit(Book $book): View
    {
        return view('books.edit', [
            'book' => $book
        ]);
    }

    /**
     * Update book
     */
    public function update(BookUpdateRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        return to_route('book.show');
    }

    /**
     * Delete book
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return to_route('books.show');
    }
}
