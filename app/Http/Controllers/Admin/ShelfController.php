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
            'shelves' => Shelf::latest()->filter(request(['search']))->get()
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
        return view('admin.shelves.create');
    }

    /**
     * Store shelf
     */
    public function store(CreateShelfRequest $request)
    {
        $data = $request->validated();
        $shelf = Shelf::create($data);
        return redirect(route('shelves.show'));
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
