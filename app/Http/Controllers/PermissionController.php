<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PermissionController extends Controller
{
    protected $permissionService;

    /**
     * Create a new controller instance.
     *
     * @param \App\Services\PermissionService $permissionService The PermissionService instance.
     * @return void
     */
    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }

    /**
     * Display a listing of the permissions.
     *
     * @param \Illuminate\Http\Request $request The HTTP request instance.
     * @return \Illuminate\Contracts\View\View The view containing the list of permissions.
     */
    public function index(Request $request): \Illuminate\Contracts\View\View
    {
        // Check if the user has permission to view permissions, otherwise abort with a 403 Forbidden error
        abort_if(auth()->user()->hasPermission('view_permission'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // Retrieve the search query from the request
        $searchQuery = $request->input('search');

        // Call the PermissionService to search for permissions and paginate the results
        $permissions = $this->permissionService->searchPermissions($searchQuery);

        // Pass the permissions and search query to the view
        return view('permission.index', compact('permissions', 'searchQuery'));
    }


    /**
     * Show the form for creating a new permission.
     */
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
