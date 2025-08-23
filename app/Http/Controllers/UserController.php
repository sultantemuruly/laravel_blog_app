<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingData = $request->validate([
            'name' => ['required', 'min:3', 'max:30', Rule::unique('users', 'name')],
            'email' => ['required', 'email',  Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'max:30']
        ]);
        
        $incomingData['password'] = bcrypt($incomingData['password']);
        $user = User::create($incomingData); 
        auth()->login($user);

        return redirect('/');
    }

    public function login(Request $request)
    {
        $incomingData = $request->validate([
            'loginemail' => ['required', 'email'],
            'loginpassword' => ['required']
        ]);

        if (auth()->attempt(['email' => $incomingData['loginemail'], 'password' => $incomingData['loginpassword']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
