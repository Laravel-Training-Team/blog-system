<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.User.register');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'first_name' => ['required'],
                'last_name' => ['required'],
                'username' => ['required'],
                'email' => ['required', 'email', 'max:55'],
                'password' => ['required', 'min:10', Password::min(10)->numbers()->letters()->max(30)],
            ]);

            $user = User::create($attributes);

            Auth::login($user);

            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Error in RegisteredUserController@store: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}