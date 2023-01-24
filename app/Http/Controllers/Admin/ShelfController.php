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
        $shelves = Shelf::all();
        return view('admin.shelves.index', [
            'shelves' => $shelves
        ]);
    }


    /**
     * Show create shelf form
     */
    public function create()
    {
        return view('admin.shelves.create', [
            'books' => Book::query()->latest()->select('id', 'name')->get()
        ]);
    }

    /**
     * Store shelf
     */
    public function store(CreateShelfRequest $request)
    {
        $data = $request->validated();
        if(!auth()->check()){
          return to_route('login');
        }
        $data['user_id'] = auth()->id();
        $data['slug'] = Str::slug($data['name']);
        $shelf = Shelf::create($data);
        return view('admin.shelves.index', [
            'shelves' => Shelf::all()
        ]);
    }

    public function show($slug)
    {
        $shelf = Shelf::where('slug', '=', $slug)->first();
        if ($shelf === null) {
            throw new ModelNotFoundException();
        }
        $books = $shelf->books;
        return view('admin.shelves.show', [
            'shelf' => $shelf,
            'books' => $books,
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
