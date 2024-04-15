<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreChatRequest;
use App\Http\Requests\UpdateChatRequest;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $chats = $user->chat()->get();
        foreach($chats as $chat){
            $chat->last_message = DB::table('messages')->where('chat_id', $chat->id)->orderBy('created_at')->get()->last();
        }
        return response()->json($chats);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChatRequest $request)
    {
        $users = explode(';', $request['users']);
        $users = [...$users, Auth::user()->id];

        $chat = Chat::create([
            'name' => $request['name']
        ]);

        foreach($users as $user){
            DB::table('chat_user')->insert([
               'user_id' => $user,
               'chat_id' => $chat->id,
                'created_at' => now()
            ]);
        }

        return response()->json($chat);
    }

    /**
     * Display the specified resource.
     */
    public function show(Chat $chat)
    {
        //dd($chat->messages());
        $chat = Auth::user()->chat()->where('id', $chat->id)->first();
        if ($chat){
            $chat->messages = $chat->messages()->orderBy('created_at')->with('user')->get();
            $chat->last_message = $chat->messages->last();
            return response()->json($chat);
        } else {
            abort(403);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChatRequest $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
