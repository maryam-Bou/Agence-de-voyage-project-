<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        Message::create($validated);

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    public function index()
    {
        $messages = Message::latest()->paginate(10);
        return view('dashboard.messages.index', compact('messages'));
    }

    public function markAsRead(Message $message)
    {
        $message->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Message marked as read.');
    }

    public function destroy(Message $message)
    {
        $message->delete();
        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
