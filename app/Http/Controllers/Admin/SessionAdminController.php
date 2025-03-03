<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionAdminController extends Controller
{
    public function create()
    {
        return view('auth.admin.login');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::guard('admin')->attempt($attributes)) {
                throw ValidationException::withMessages([
                    'password' => 'Sorry, there was an error. Please try again!',
                ]);
            }

            request()->session()->regenerate();

            return redirect('/');
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
            Auth::guard('admin')->logout();
            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Error during logout: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }
}