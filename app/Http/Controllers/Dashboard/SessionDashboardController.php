<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionDashboardController extends Controller
{
    public function create()
    {
        return view('auth.dashboard.login');
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
            if ($user->role === 'admin') {
                request()->session()->regenerate();
                return redirect('/admin/dashboard'); 
            } elseif ($user->role === 'writer') {
                request()->session()->regenerate();
                return redirect('/writer/dashboard');
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
            if (Auth::guard('admin')->check()) {
                Auth::guard('admin')->logout();
            } elseif (Auth::guard('writer')->check()) {
                Auth::guard('writer')->logout();
            }

            return redirect('/');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }catch (\Exception $e) {
            Log::error('Error during logout: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An unexpected error occurred. Please try again later.']);
        }
    }
}