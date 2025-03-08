<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\DB;
use App\Mail\UserResetPasswordMail;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class UserForgetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('forgetpassword.user.forget-password');
    }

    public function sendResetLinkEmail(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
            ]);

            $user = DB::table('users')
                ->where('email', $request->email)
                ->where('role', 'user')
                ->first();

            if (!$user) {
                return back()->withErrors(['email' => 'Email not found']);
            }

            $token = Str::random(60);

            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => now(),
            ]);

            Mail::to($request->email)->send(new UserResetPasswordMail($token));

            return back()->with('success', 'Reset Password link sent!');
        }catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error in sendResetLinkEmail: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    public function showResetPasswordForm($token)
    {
        return view('forgetpassword.user.updatepassword', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => [
                    'required','min:10',Password::min(10)->numbers()->letters()->max(30),
                ],
            ]);

            $reset = DB::table('password_resets')
                ->where('email', $request->email)
                ->where('token', $request->token)
                ->first();

            if (!$reset) {
                return back()->withErrors(['email' => 'The code is invalid or expired.']);
            }

            $user = DB::table('users')->where('email', $request->email)->first();

            if ($user) {
                DB::table('users')
                    ->where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
            } else {
                return back()->withErrors(['email' => 'Email not found in users or admins.']);
            }

            DB::table('password_resets')
                ->where('email', $request->email)
                ->delete();

            return redirect('/login')->with('success', 'Your password has been reset successfully.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }catch (\Exception $e) {
            Log::error('Error in resetPassword: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}