<?php


namespace App\Traits;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait HasPermissions
{
    /**
     * Get all permissions of this role
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_role');
    }

    /**
     * Assign permission for this role
     */
    public function attachPermission(string $permissionName): self
    {
        $permission = Permission::getByName($permissionName);
        if ($this->permissions->contains($permission)) {
            return $this;
        }
        $this->permissions()->attach($permission);
        return $this;
    }

    /**
     * Delete  permission
     */
    public function deletePermission(string $permissionName): self
    {
        $permission = Permission::getByname($permissionName);
        $this->permissions()->detach($permission);
        return $this;
    }
}
