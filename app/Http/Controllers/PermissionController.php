<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permission_show', ['only' => ['index']]);
    }

    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $searchQuery = '';
        if($request->has('search')){
            $searchQuery = $request->search;
            $permissions = Permission::where('name', 'like', '%' . $searchQuery . '%')->paginate(10);
        }else{
            $permissions = Permission::paginate(10);
        }
        return view('pages.permissions.index', compact('permissions', 'searchQuery'));
    }
}
