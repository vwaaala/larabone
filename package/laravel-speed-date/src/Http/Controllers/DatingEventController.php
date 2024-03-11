<?php

namespace Bunker\LaravelSpeedDate\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bunker\LaravelSpeedDate\Models\DatingEvent;
use Bunker\LaravelSpeedDate\Enums\EventTypeEnum;

class DatingEventController extends Controller
{
    public function index()
    {
        $events = DatingEvent::all();

        return view('speed-date::index_event', compact('events'));
    }

    public function create()
    {
        return view('speed-date::create_event');
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

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(DatingEvent $event)
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
