<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listUsers()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'data' => $users
        ]);
    }

    public function addUser()
    {
        $user = $this->validate(request(), [
            'firstname' => 'required|alpha_dash',
            'lastname' => 'required|alpha_dash',
        ]);
        
        $user = User::create($user);

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }

    public function get($id)
    {
        $user = User::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
}
