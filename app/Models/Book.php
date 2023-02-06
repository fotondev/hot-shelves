<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Shelf;
use App\Models\Entity;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    /**
     * Search filter
     */
    public static function scopeFilter($query, array $filters): void
    {
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>
            $query->where(
                fn ($q) =>
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['shelf'] ?? false, fn ($query, $shelf) =>
        $query
            ->whereHas(
                'shelf',
                fn ($query) =>
                $query
                    ->where('slug', $shelf)
            ));
    }

    /**
     * Get the url for this book.
     */
    public function getUrl(string $path = ''): string
    {
        return url('/books/' . implode('/', [urlencode($this->slug), trim($path, '/')]));
    }

    /**
     * Get slug from this book
     */
    public static function getSlug(self $book): string
    {
        return static::where('id', $book->id)->pluck('slug');
    }

    /**
     * Get the shelves for this book
     */
    public function shelves(): BelongsToMany
    {
        return $this->belongsToMany(Shelf::class, 'book_shelf');
    }

    /**
     * Get all pages for this book.
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
