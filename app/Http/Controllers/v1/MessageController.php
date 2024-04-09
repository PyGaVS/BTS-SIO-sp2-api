<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Message::with('user')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMessageRequest $request)
    {
        if(Auth::user()->getAuthIdentifier() != $request['user_id']){
            abort(403);
        }
        $chat = Auth::user()->chat()->where('id', $request['chat_id'])->first();
        if(!$chat){
            abort(403);
        }
        $message = Message::create([
            'user_id' => Auth::user()->getAuthIdentifier(),
            'chat_id' => $chat->id,
            'content' => $request['content'],
        ]);

        $message['user'] = Auth::user();
        return response()->json($message, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }

    public function roleTestMessage(User $user)
    {
        if(auth()->user()->can('viewAny', Message::class)) {
            return Message::all();
        } else {
            return abort(405);
        }
    }
}
