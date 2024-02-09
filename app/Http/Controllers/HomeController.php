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

//         dd();
         return view('home');

//        abort_if(auth()->user()->roles(), Response::HTTP_FORBIDDEN, '403 Forbidden');
//
//        $users = User::paginate(5);
//
//        return view('pages.users.index', compact('users'));
    }


}
