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
