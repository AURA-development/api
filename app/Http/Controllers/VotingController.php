<?php

namespace App\Http\Controllers;

use App\User;

class VotingController extends Controller
{
    public function upvote()
    {
        $name = request()->input('to_id');
        $user = User::findOrFail($name);

        if (request()->input('to_id') == request()->input('from_id')) {
            return response()->json([
                'success' => false,
                'error' => 'VoteSelfError',
                'formatted' => 'You cannot upvote yourself, you miserable creature.'
            ]);
        }

        $user->votes()->create([
            'from_id' => request()->input('from_id'),
            'positive' => true,
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function downvote()
    {
        $name = request()->input('to_id');
        $user = User::findOrFail($name);

        if (request()->input('to_id') == request()->input('from_id')) {
            return response()->json([
                'success' => false,
                'error' => 'VoteSelfError',
                'formatted' => 'You cannot downvote yourself, you awesome creature.'
            ]);
        }

        $user->votes()->create([
            'from_id' => request()->input('from_id'),
            'positive' => false,
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
