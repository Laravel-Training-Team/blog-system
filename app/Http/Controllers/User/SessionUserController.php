<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionUserController extends Controller
{
    public function create()
    {
        return view('auth.user.login');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (Auth::guard('web')->attempt($attributes)) {
                $user = Auth::guard('web')->user();
            } else {
                throw ValidationException::withMessages([
                    'password' => 'Sorry, there was an error. Please try again!',
                ]);
            }
            if ($user->role === 'user') {
                request()->session()->regenerate();
                return redirect('/user/dashboard'); 
            } else {
                throw ValidationException::withMessages([
                    'role' => 'Unauthorized.',
                ]);
            }
        } catch (ValidationException $e) {
            Log::error('Validation error during login: ' . $e->getMessage());
            throw $e;
        } catch (\Exception $e) {
            Log::error('Error during login: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }

    public function destroy()
    {
        try {
                Auth::guard('web')->logout();

            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Error during logout: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }
}
