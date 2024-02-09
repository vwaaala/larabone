<?php

namespace App\Services;

use App\Models\Permission;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PermissionService
{
    /**
     * Search for permissions based on the provided search query and paginate the results.
     *
     * @param string|null $searchQuery The search query to filter permissions.
     * @return LengthAwarePaginator
     */
    public function searchPermissions($searchQuery)
    {
        // Start building the query to retrieve permissions using Eloquent ORM
        $permissions = Permission::query();

        // If a search query is provided, filter permissions based on the name or description matching the search query
        if (!empty($searchQuery)) {
            $permissions->where(function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%')->orWhere('description', 'like', '%' . $searchQuery . '%');
            });
        }

        // Paginate the filtered permissions with a limit of 10 records per page
        return $permissions->paginate(10);
    }
}
