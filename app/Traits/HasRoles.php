<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


trait HasRoles
{

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    /**
     * Check if user has roles
     */
    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if ($this->roles->contains('name', $role)) {
                return true;
            }
            return false;
        }
    }

    /**
     * Check if user has permission through role
     */
    public function hasPermissionThroughRole(string $permissionName): bool
    {
        $permission = Permission::getByName($permissionName);
        foreach ($permission->roles as $role) {
            if ($this->roles->contains($role)) {
                return true;
            }
            return false;
        }
    }

    /**
     * Check if user has permission
     */
    public function hasPermissionTo(string $permissionName): bool
    {
        return $this->hasPermissionThroughRole($permissionName);
    }
}
