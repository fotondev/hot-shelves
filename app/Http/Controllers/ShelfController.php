<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShelfStoreRequest;
use App\Http\Requests\CreateShelfRequest;
use App\Http\Requests\ShelfUpdateRequest;
use App\Http\Requests\UpdateShelfRequest;


class ShelfController extends Controller
{

    /**
     * Show all shelves
     */
    public function index(): View
    {
        return view('shelves.index', [
            'shelves' => Shelf::all()
        ]);
    }

    /**
     * Show shelf
     */
    public function show(Shelf $shelf): View
    {
        $books = $shelf->books;
        return view('shelves.show', [
            'shelf' => $shelf,
            'books' => $books
        ]);
    }

    /**
     * Show create shelf form
     */
    public function create(): View
    {
        $books = Book::all();
        return view('shelves.create', compact('books'));
    }

    /**
     * Store shelf
     */
    public function store(ShelfStoreRequest $request)
    {
        $data = $request->validated();
        $shelf = Shelf::create($data);
        if ($request->has('books')) {
            $shelf->books()->attach($request->books);
        }
        session()->flash('message', 'Полка создана');
        return to_route('shelves.show');
    }

    /**
     * Show edit shelf form
     */
    public function edit(Shelf $shelf): View
    {
        $books = Book::all();
        return view('shelves.edit', [
            'shelf' => $shelf,
            'books' => $books
        ]);
    }

    /**
     * Update shelf
     */
    public function update(ShelfUpdateRequest $request, Shelf $shelf)
    {
        $data = $request->validated();
        $shelf->update($data);
        $shelf->books()->sync($request->books);
        session()->flash('message', 'Полка отредактирована');
        return to_route('shelves.show');
    }

    /**
     * Delete shelf
     */
    public function destroy(Shelf $shelf)
    {
        $shelf->delete();
        session()->flash('message', 'Полка удалена');
        return to_route('shelves.show');
    }
}
