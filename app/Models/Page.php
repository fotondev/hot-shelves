<?php

namespace App\Models;

use App\Models\Entity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'slug',
        'body',
        'book_id',
        
    ];

     /**
     * Get the url for this page.
     */
    public function getUrl(string $path = ''): string
    {
        return url('/books/' . implode('/', [urlencode($this->book->slug), trim($path, '/')]) . 'pages/' . implode('/', [urlencode($this->slug), trim($path, '/')]));
    }

    public static function getBySlug(string $slug): self
    {
        return Page::where('slug', $slug)->firstOrFail();
        
    }
    
    /**
     * Get the book for this page
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

}
