<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    use HasFactory;

    public function roles(): BelongsToMany
    {   
        return $this->belongsToMany(Role::class, 'permission_role');
    }

    public static function getByName(string $name): self
    {
        return Permission::where('name', $name)->first();
    }
}
