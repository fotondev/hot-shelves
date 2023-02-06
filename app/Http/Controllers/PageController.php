<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Page;
use App\Http\Controllers\Controller;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;

class PageController extends Controller
{

    public function index()
    {
        return view('pages.index', [
            'pages' => Page::all()
        ]);
    }

    public function create(Book $book)
    {
        return view('pages.create', [
            'book' => $book
        ]);
    }

    public function store(PageStoreRequest $request, Book $book)
    {
        $data = $request->validated();
        $page = Page::create($data);
        return to_route('book.show');
    }

    public function show(Book $book, Page $page)
    {
        return view('pages.show', [
            'page' => $page,
        ]);
    }

    public function edit(Book $book, Page $page)
    {
        return view('pages.edit', [
            'book' => $book,
            'page' => $page
        ]);
    }

    public function update(PageUpdateRequest $request, Page $page)
    {
        $data = $request->validated();
        $page->update($data);
        return to_route('book.show');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return to_route('book.show');
    }
}
