<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'content',
    ];


    /**
     * 
     */
    protected $with = [
        'publisher'
    ];
    

    /**
     * Get the book for this page
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    /**
     * Get the user of this page.
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
