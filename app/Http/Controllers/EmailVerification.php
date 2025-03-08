<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Log;

class EmailVerification extends Controller
{
    
    #Show the email verification notice and send the verification email.
     
    public function verifyNotice(Request $request)
    {
        try {
            $request->user()->sendEmailVerificationNotification();
            return view('auth.VerifyEmail.verify-notice', [
                'message' => 'The email should be verified to use the system.',
            ]);
        } catch (\Exception $e) {
            Log::error('Error in verifyNotice: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    #Handle the email verification process.
   
    public function verifyEmail(EmailVerificationRequest $request)
    {
        try {
            $request->fulfill();
            return view('auth.VerifyEmail.verify-success', [
                'message' => 'Verification done!',
            ]);
        } catch (\Exception $e) {
            Log::error('Error in verifyEmail: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }

    #Resend the email verification link.
   
    public function verifyHandler(Request $request)
    {
        try {
            $request->user()->sendEmailVerificationNotification();
            return view('auth.VerifyEmail.verify-resend', [
                'message' => 'Email verification link sent again!',
            ]);
        } catch (\Exception $e) {
            Log::error('Error in verifyHandler: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred. Please try again.']);
        }
    }
}