<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Book;
use App\Models\Shelf;

class BookService
{
   
    public function __construct()
    {}

    public function addToShelf(array $data, string $shelfSlug): array
    {
        $shelf = Shelf::getBySlug($shelfSlug);
        $data['shelf_id'] = $shelf->id;
        return $data;
    }

    public function addPage(array $data, string $bookSlug): array
    {
        $book = Book::getBySlug($bookSlug);
        $data['book_id'] = $book->id;
        return $data;
    }
}
