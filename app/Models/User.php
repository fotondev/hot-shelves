<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

     /**
     * Get the child shelf of this user.
     */
    public function shelves(): HasMany
    {
        return $this->hasMany(Shelf::class, 'shelf_id');
    }

    /**
     * Get the child book of this user.
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'book_id');
    }

    /**
     * Get all pages for this user.
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class, 'page_id');
    }


}
