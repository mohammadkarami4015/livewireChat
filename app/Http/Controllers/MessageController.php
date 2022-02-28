<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function store(StoreMessageRequest $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $message = $user->messages()->create(['message' => $request->input('message')]);

        // send event to listeners
        broadcast(new MessageSentEvent($message));
        return 'successful';
    }
}
