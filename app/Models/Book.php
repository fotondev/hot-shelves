<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'description',
        'image',
    ];

    /**
     * 
     */
    protected $with = [
        'publisher'
    ];

    public static function scopeFilter($query, array $filters): void
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query
            ->where('name', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%'));


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
     * Get the shelves for this book
     */
    public function shelves(): BelongsToMany
    {
        return $this->belongsToMany(Shelf::class, 'shelf_id');
    }

    /**
     * Get all pages for this book.
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Get the user of this book.
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
