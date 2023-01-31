<?php

namespace App\Http\Controllers\Admin;

use Stringable;
use App\Models\Book;
use App\Models\User;
use App\Models\Shelf;
use Carbon\CarbonPeriod;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShelfRequest;
use App\Entities\Repositories\BookRepository;
use App\Entities\Repositories\ShelfRepository;
use App\Http\Requests\UpdateShelfRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class ShelfController extends Controller
{

    /**
     * Show all shelves
     */
    public function index()
    {
        return view('admin.shelves.index', [
            'shelves' => Shelf::latest()->with('books')->filter(request(['search']))->get()
        ]);
    }

    /**
     * Show shelf
     */
    public function show(string $slug)
    {
        $shelf = Shelf::where('slug',  $slug)->firstOrFail();
        $books = $shelf->books;
        return view('admin.shelves.show', [
            'shelf' => $shelf,
            'books' => $books,
        ]);
    }

    /**
     * Show create shelf form
     */
    public function create()
    {
        $books = Book::all();
        return view('admin.shelves.create', compact('books'));
    }

    /**
     * Store shelf
     */
    public function store(CreateShelfRequest $request)
    {
        $data = $request->validated();
        $shelf = Shelf::create($data);
        session()->flash('message', 'Полка создана');
        return redirect(route('shelves.show'));
    }

    /**
     * Show edit shelf form
     */
    public function edit(string $slug)
    {
        $shelf = Shelf::where('slug',  $slug)->firstOrFail();
        $books = Book::all();
        return view('admin.shelves.edit', [
            'shelf' => $shelf,
            'books' => $books
        ]);
    }

    /**
     * Update shelf
     */
    public function update(UpdateShelfRequest $request, string $slug)
    {
        $data = $request->validated();
        $shelf = Shelf::where('slug',  $slug)->firstOrFail();
        $shelf->update($data);
        session()->flash('message', 'Полка отредактирована');
        return redirect(route('shelves.show'));
    }

     /**
     * Delete shelf
     */
    public function destroy(string $slug)
    {
        $shelf = Shelf::where('slug',  $slug)->firstOrFail();
        $shelf->delete();
        session()->flash('message', 'Полка удалена');
        return redirect(route('shelves.show'));
    }
}
