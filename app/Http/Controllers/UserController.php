<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingData = $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:30']
        ]);
        
        $incomingData['password'] = bcrypt($incomingData['password']);
        User::create($incomingData);

        return "thank you for registering!";
    }
}
