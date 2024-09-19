<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class ChatController extends Controller
{
    //
    public function index(Request $request, $userId = null)
    {
        $selectedUser = $userId ? User::findOrFail($userId) : null;
        $messages = collect();

        if ($selectedUser) {
            $messages = Message::with('user', 'receiver')
                ->where(function($query) use ($selectedUser) {
                    $query->where('user_id', Auth::id())
                          ->where('receiver_id', $selectedUser->id);
                })
                ->orWhere(function($query) use ($selectedUser) {
                    $query->where('user_id', $selectedUser->id)
                          ->where('receiver_id', Auth::id());
                })
                ->orderBy('created_at', 'asc')
                ->get();
        }

        $users = User::where('id', '!=', Auth::id())->get(); // Fetch all users except the logged-in user

        return view('chat.index', compact('messages', 'users', 'selectedUser'));
    }
    public function fetchMessages($userId)
    {
        // Fetch all messages with the user details
       // $messages = Message::with('user')->orderBy('created_at', 'asc')->get();

        // Return messages as JSON
       // return response()->json($messages);


       $messages = Message::with('user')
        ->where(function($query) use ($userId) {
            $query->where('user_id', Auth::id())
                  ->where('receiver_id', $userId);
        })
        ->orWhere(function($query) use ($userId) {
            $query->where('user_id', $userId)
                  ->where('receiver_id', Auth::id());
        })
        ->orderBy('created_at', 'asc')
        ->get();

    // Mark messages as read
    foreach ($messages as $message) {
        if ($message->receiver_id == Auth::id() && !$message->isRead()) {
            $message->markAsRead();
        }
    }

    return response()->json($messages);
    }

    

    public function sendMessage(Request $request)
    {
        // Validate the request
        $request->validate([
            'message' => 'required|string|max:1000',
            'receiver_id' => 'required|exists:users,id',
        ]);

        // Store the message
        $message = Message::create([
            'user_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
        ]);

       // return response()->json($message->load('user', 'receiver'));
       return redirect()->back()->with('success', 'Message sent successfully!');
    }

}
