<?php

namespace App\Queries;

use App\Models\Book;
use App\Models\Page;
use App\Models\User;
use App\Models\Shelf;
use Illuminate\Contracts\Database\Query\Builder;

class CreatedContent
{
    /**
     * @return array{pages: Collection, chapters: Collection, books: Collection, shelves: Collection}
     */
    public function getContent(User $user): array
    {
        //     $query = function(Builder $query) use($user){
        //         return $query->where('user_id', '=', $user)->get();
        //     };
        return [
            'shelves' => Shelf::where('user_id', '=', $user->id)->get(),
            'books' => Book::where('user_id', '=', $user->id)->get(),
            'pages' => Page::where('user_id', '=', $user->id)->get(),
        ];
    }
}
