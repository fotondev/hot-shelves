<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookStoreRequest;
use App\Http\Requests\BookUpdateRequest;


class BookController extends Controller
{
    /**
     * Show all books
     */
    public function index(): View
    {
        return view('admin.books.index', [
            'books' => Book::latest()
                ->filter(request(['search', 'shelf',]))
                ->with('publisher')
                ->get()
        ]);
    }

    /**
     * Show create form
     */
    public function create(): View
    {
        return view('admin.books.create');
    }

    /**
     * Store new book
     */
    public function store(BookStoreRequest $request)
    {
        $data = $request->validated();
        $book = Book::create($data);
        return redirect(route('books.show'));
    }

    /**
     * Show book
     */
    public function show(string $slug): View
    {
        $book = Book::where('slug', '=', $slug)->with(['pages', 'publisher'])->firstOrFail();
        $pages = $book->pages->load(['publisher']);
        return view('admin.books.show', [
            'book' => $book,
            'pages' => $pages,
        ]);
    }

     /**
     * Show edit form
     */
    public function edit(): View
    {
        return view('admin.books.edit');
    }

     /**
     * Update book
     */
    public function update(BookUpdateRequest $request, string $slug)
    {
        $data = $request->validated();
        $book = Book::where('slug', $slug)->firstOrFail();
        $book->update($data);
        return redirect(route('book.show'));
    }

    /**
     * Delete book
     */
    public function destroy(string $slug)
    {
        $book = Book::where('slug', $slug)->firstOrFail();
        $book->delete();
        return redirect(route('books.show'));
    }
}
