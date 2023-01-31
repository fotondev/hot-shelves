<?php

namespace App\View\Components;

use App\Models\Book;
use Illuminate\View\Component;

class BookSelect extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.book-select', [
            'books' => Book::query()->latest()->select('id', 'name')->get()
        ]);
    }
}
