<?php

namespace App\Http\Controllers\dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class RegisteredDashboardController extends Controller
{
    public function create()
    {
        return view('auth.dashboard.register');
    }

    public function store()
    {
        try {
            $attributes = request()->validate([
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'username' => ['required', 'string', 'max:50', 'unique:users'],
                'email' => ['required', 'email', 'max:55', 'unique:users'],
                'password' => ['required', 'min:10', Password::min(10)->numbers()->letters()->max(30)],
                'date_of_birth' => ['required', 'date'],
                'country' => ['required', 'string', 'max:50'],
                'address' => ['required', 'string', 'max:255'],
                'bio' => ['nullable', 'string', 'max:500'],
                'about_me' => ['nullable', 'string', 'max:500'],
                'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
                'background_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
            ]);

            $attributes['role'] = 'writer';

            $writer = User::create($attributes);
            Auth::login($writer);

            return redirect('/writer/dashboard');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in RegisteredDashboardController@store: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
    // will be protected for auth admin only 
    public function createAdmin()
    {
        return view('auth.dashboard.adminregister');
    }

    public function storeAdmin()
    {
        try {
            $attributes = request()->validate([
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'username' => ['required', 'string', 'max:50', 'unique:users'],
                'email' => ['required', 'email', 'max:55', 'unique:users'],
                'password' => ['required', 'min:10', Password::min(10)->numbers()->letters()->max(30)],
                'date_of_birth' => ['required', 'date'],
                'country' => ['required', 'string', 'max:50'],
                'address' => ['required', 'string', 'max:255'],
                'bio' => ['nullable', 'string', 'max:500'],
                'about_me' => ['nullable', 'string', 'max:500'],
                'profile_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
                'background_picture' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
            ]);

            $attributes['role'] = 'admin';

            $admin = User::create($attributes);
            Auth::login($admin);

            return redirect('/admin/dashboard');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }catch (\Exception $e) {
            Log::error('Error in RegisteredDashboardController@store: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

}
