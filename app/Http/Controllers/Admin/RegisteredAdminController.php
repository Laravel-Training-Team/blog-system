<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredAdminController extends Controller
{
    public function create()
    {
        return view('auth.admin.register');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'username' => ['required'],
                'email' => ['required', 'email', 'max:55'],
                'password' => ['required', 'min:10', Password::min(10)->numbers()->letters()->max(30)]
            ]);

            $admin = Admin::create($attributes);

            Auth::login($admin);

            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Error in RegisteredAdminController@store: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}