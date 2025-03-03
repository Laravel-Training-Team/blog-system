<?php

namespace App\Http\Controllers\Writer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Writer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class RegisteredWriterController extends Controller
{
    public function create()
    {
        return view('auth.Writer.register');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'username' => ['required'],
                'email' => ['required', 'email', 'max:55'],
                'password' => ['required', 'min:10', Password::min(10)->numbers()->letters()->max(30)],
            ]);

            $writer = Writer::create($attributes);

            Auth::login($writer);

            return redirect('/');
        } catch (\Exception $e) {
            Log::error('Error in RegisteredWriterController@store: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}