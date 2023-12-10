<?php
namespace App\Http\Controllers;

use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // BEGIN: abpxx6d04wxr
    public function index()
    {
        // Retrieve all chats from the database
        $messages = Chat::all();

        // Return the chats as a response
        return response()->json($messages);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'message' => 'required|string',
            'user_name' => 'required|string',
        ]);

        // Create a new chat instance
        $chat = new Chat();
        $chat->message = $validatedData['message'];
        $chat->user_name = $validatedData['user_name'];

        // Save the chat to the database
        $chat->save();

        // Return a success response
        return response()->json(['message' => 'Chat stored successfully']);
    }
    // END: abpxx6d04wxr
}
