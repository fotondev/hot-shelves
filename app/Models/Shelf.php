<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


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
        'createdBy'
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

    public static function getBySlug(string $slug): self
    {
        return Shelf::where('slug', $slug)->firstOrFail();
        
    }

    /**
     * Get the child books of this shelf.
     */
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }

}
