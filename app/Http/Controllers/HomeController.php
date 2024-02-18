<?php

namespace App\Http\Controllers;

use App\Models\PublicMessage;
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
    public function index(Request $request)

    {
        $messages = PublicMessage::select('message', 'created_at')->paginate(20);

        if ($request->ajax()) {
            return response()->json(['html' =>$messages]);

        }
        return view('home', compact('messages'));

    }


}
