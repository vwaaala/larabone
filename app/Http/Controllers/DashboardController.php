<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

/**
 * Class DashboardController
 *
 * This controller handles operations related to the application dashboard.
 */
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Apply the 'auth' middleware to ensure that only authenticated users can access the dashboard.
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request The HTTP request object.
     * @return Renderable The renderable view representing the application dashboard.
     */
    public function index(Request $request): Renderable
    {
        // Initialize the packet array
        $packet = [];

        // Determine if the authenticated user has the 'User' role
        if(auth()->user()->hasRole('User')){
            // If the user has the 'User' role, get the analytic card for the user
            $packet['cards'][] = (new \Bunker\SupportTicket\Models\Ticket)->getAnalyticCard(true, auth()->user()->id);
        } else {
            // If the user does not have the 'User' role, get the analytic card for all users
            $packet['cards'][] = (new \Bunker\SupportTicket\Models\Ticket)->getAnalyticCard(false);
        }
        
        // Render the dashboard view and pass the packet data
        return view('pages.dashboard', compact('packet'));
    }
}
