<?php

namespace App\Http\Controllers;

use Bunker\SupportTicket\Models\Ticket;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * @param Request $request
     * @return Renderable
     */
    public function index(Request $request): \Illuminate\Contracts\Support\Renderable
    {
        $packet = [];
        if(auth()->user()->hasRole('User')){
            $packet['cards'][] = (new \Bunker\SupportTicket\Models\Ticket)->getAnalyticCard(true, auth()->user()->id);
        }else{
            $packet['cards'][] = (new \Bunker\SupportTicket\Models\Ticket)->getAnalyticCard(false);
//            dd($packet);
        }
        return view('pages.dashboard', compact('packet'));
    }

}
