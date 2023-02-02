<?php

namespace App\Services;

use App\Models\Book;
use App\Models\Page;
use App\Models\User;
use App\Models\Shelf;


/**
 * Get user created content
 */
class ProfileService
{
    /**
     * @return array{shelves, books, pages}
     */
    public function getContent(User $user): array
    {
        $createdBy = ['user_id' => $user->id];
        return [
            'shelves' => Shelf::where($createdBy)->get(),
            'books' => Book::where($createdBy)->get(),
            'pages' => Page::where($createdBy)->get(),
        ];
    }
}
