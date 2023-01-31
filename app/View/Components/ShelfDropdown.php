<?php

namespace App\View\Components;

use App\Models\Shelf;
use Illuminate\View\Component;

class ShelfDropdown extends Component
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
        return view('components.shelf-dropdown', [
            'shelves' => Shelf::all(),
            'currentShelf' => Shelf::firstWhere('slug', request('shelf'))
        ]);
    }
}
