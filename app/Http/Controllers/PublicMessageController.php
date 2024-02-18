<?php

namespace App\Http\Controllers;

use App\Events\MessageEvent;
use App\Http\Requests\StorePublicMessageRequest;
use App\Models\PublicMessage;
use Illuminate\Http\Request;

class PublicMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:message_create|message_show', ['only' => ['index']]);
        $this->middleware('permission:message_create|message_show', ['only' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $messages = PublicMessage::paginate(2);
        if ($request->ajax()) {
            $view = view('data', compact('messages'))->render();
            return response()->json(['html' => $view]);

        }
        return view('home', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublicMessageRequest $request)
    {
        if ($request->ajax()) {
            $message = PublicMessage::create(['message' => $request->message, 'user_id' => auth()->user()->id]);
            if ($message) {
                broadcast(new MessageEvent($message->message));
                return response()->json(['status' => 'success', 'message' => 'ok']);
            }
            return response()->json(['status' => 'error', 'message' => 'Message can not be created']);
        }
        return response()->json(['status' => 'error', 'message' => 'Request method not allowed']);
    }

}
