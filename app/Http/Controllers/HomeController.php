<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = User::whereName('Admin')->first();
        // $admin_role = Role::whereName('admin')->first();
        // $user->roles()->attach($admin_role);
        // $user = User::whereName('Admin')->with('roles')->first();
        ///////////////////////////////////////////////



        // dd($user->toArray());
        // return view('home');
    }


}
