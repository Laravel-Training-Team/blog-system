<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules\Password;

class ForgotPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.Forget.AdminAndWriter.forget-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);

            $admin = DB::table('admins')->where('email', $request->email)->first();
            $writer = DB::table('writers')->where('email', $request->email)->first();

            if (!$admin && !$writer) {
                return back()->withErrors(['email' => 'Email not found']);
            }

            $token = Str::random(60);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            Mail::to($request->email)->send(new ResetPasswordMail($token));

            return back()->with('success', 'Reset Password link sent!');
        } catch (\Exception $e) {
            Log::error('Error in sendResetLinkEmail: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    public function showResetPasswordForm($token)
    {
        return view('auth.Forget.AdminAndWriter.resetpasswords', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => ['required', 'min:10', Password::min(10)->numbers()->letters()->max(30)],
            ]);

            $reset = DB::table('password_resets')
                ->where('email', $request->email)
                ->where('token', $request->token)
                ->first();

            if (!$reset) {
                return back()->withErrors(['email' => 'The code is invalid or expired.']);
            }

            $writer = DB::table('writers')->where('email', $request->email)->first();
            $admin = DB::table('admins')->where('email', $request->email)->first();

            if ($writer) {
                DB::table('writers')
                    ->where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
            } elseif ($admin) {
                DB::table('admins')
                    ->where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
            } else {
                return back()->withErrors(['email' => 'Email not found in users or admins.']);
            }

            DB::table('password_resets')
                ->where('email', $request->email)
                ->delete();

            return redirect('/login')->with('success', 'Your password has been reset successfully.');
        } catch (\Exception $e) {
            Log::error('Error in resetPassword: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}