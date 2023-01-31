<?php

namespace App\Models;

use App\Tools\SlugBuilder;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\SlugBuilderInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

// /**
//  * Class Shelf
//  * Class for shelf
//  * 
//  *
//  * @property int        $id
//  * @property string     $name
//  * @property string     $slug
//  *
//  */

class Shelf extends Model
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
        'image_id',
        'user_id'
    ];
    protected $with = [
        'publisher'
    ];

    /**
     * Search filter
     */
    public function scopeFilter($query, array $filters): void
    {
        if ($filters['search'] ?? false) {
            $query->where(fn($q)=>
                $q->where('name', 'like', '%'. request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
        );
        }
    }

    /**
     * Get the url for this shelf.
     */
    public function getUrl(string $path = ''): string
    {
        return url('/shelves/' . implode('/', [urlencode($this->slug), trim($path, '/')]));
    }

    /**
     * Get the child books of this shelf.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /**
     * Get the user of this shelf.
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
