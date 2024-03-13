<?php

namespace Bunker\LaravelSpeedDate\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Bunker\LaravelSpeedDate\Enums\EventTypeEnum;
use Bunker\LaravelSpeedDate\Models\DatingEvent;
use Bunker\LaravelSpeedDate\Models\UserBio;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class DatingEventController extends Controller
{
    public function __construct()
    {
        // Middleware to ensure user authentication
        $this->middleware('auth');

        // Middleware to authorize access based on permissions for specific methods
        $this->middleware('permission:sd_event_show|sd_event_create|sd_event_edit|sd_event_delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:sd_event_create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sd_event_edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sd_event_delete', ['only' => ['destroy']]);
    }

    public function index(Request $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        $searchQuery = '';
        // If search parameter exists in the request, filter permissions by name
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $events = DatingEvent::where('name', 'like', '%' . $searchQuery . '%')->paginate(10);
        } else {
            // If no search parameter, fetch all permissions with pagination
            $events = DatingEvent::paginate(10);

        }

        return view('speed_date::events.index', compact('events', 'searchQuery'));
    }

    public function store(Request $request)
    {

        $request->validate(['name' => 'required|string', 'happens_on' => 'required|date:Y-m-d H:m', 'type' => 'required|in:' . implode(',', EventTypeEnum::toArray()), 'status' => 'required|boolean']);
        $event = DatingEvent::create(['name' => $request->get('name'), 'happens_on' => $request->get('happens_on'), 'type' => $request->get('type'), 'status' => $request->get('status'),]);
        if ($event) {
            return redirect()->route('speed_date.events.index')->with('success', 'Event created successfully.');
        }

        return redirect()->back()->with('error', 'Failed to create event.');
    }

    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('speed_date::events.create');
    }

    public function show(DatingEvent $event): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('speed_date::events.show', compact('event'));
    }

    public function edit(DatingEvent $event): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('speed_date::events.edit', compact('event'));
    }

    public function update(DatingEvent $event, Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['name' => 'required|string', 'happens_on' => 'required|date:Y-m-d H:m', 'type' => 'required|in:' . implode(',', EventTypeEnum::toArray()), 'status' => 'required|boolean']);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function uploadUsers(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['csv_file' => 'required|mimes:csv,txt',]);

        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');
            $csvData = file_get_contents($file);
            $rows = array_map('str_getcsv', explode("\n", $csvData));

            foreach ($rows as $row) {
                // handle duplicate user
                $checkUserExist = User::where('email', $row[1])->first();
                if ($checkUserExist) {
                    // update existing user bio
                    $checkUserExist->bio->update(['nickname' => $row[3], 'city' => $row[4], 'occupation' => $row[5], 'phone' => $row[6], 'birthdate' => $row[7], 'gender' => $row[8], 'looking_for' => $row[9]]);
                } else {
                    // Assuming CSV columns are: name, email, status, password
                    $newUser = User::create(['uuid' => str()->uuid(), 'name' => $row[0], 'email' => $row[1], 'password' => bcrypt($row[2]), // Assuming password needs to be hashed
                    ]);
                    // create user bio
                    UserBio::create(['user_id' => $newUser->id, 'nickname' => $row[3], 'city' => $row[4], 'occupation' => $row[5], 'phone' => $row[6], 'birthdate' => $row[7], 'gender' => $row[8], 'looking_for' => $row[9],]);
                }

            }

            return redirect()->back()->with('success', 'Users created successfully.');
        }

        return redirect()->back()->with('error', 'Please provide a valid CSV file.');
    }

    // csv uploads insert bulk user in specific event


    public function destroy(DatingEvent $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
