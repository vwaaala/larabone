<?php

namespace Bunker\LaravelSpeedDate\Http\Controllers;

use App\Http\Controllers\Controller;
use Bunker\LaravelSpeedDate\Enums\EventTypeEnum;
use Bunker\LaravelSpeedDate\Models\DatingEvent;
use Illuminate\Http\Request;

class EventRatingController extends Controller
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
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $events = DatingEvent::all();

        return view('speed_date::events.index', compact('events'));
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('speed_date::events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'uuid' => 'required|uuid',
            'name' => 'required|string',
            'status' => 'required|in:' . implode(',', array_values(EventTypeEnum::toArray())),
            'active' => 'required|boolean',
        ]);

        DatingEvent::create($request->all());

        return redirect()->route('speed_date.events.index')->with('success', 'Event created successfully.');
    }

    public function show(DatingEvent $event): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('events.show', compact('event'));
    }

    public function edit(DatingEvent $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, DatingEvent $event)
    {
        $request->validate([
            'uuid' => 'required|uuid',
            'name' => 'required|string',
            'status' => 'required|in:' . implode(',', array_values(EventTypeEnum::toArray())),
            'active' => 'required|boolean',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(DatingEvent $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
