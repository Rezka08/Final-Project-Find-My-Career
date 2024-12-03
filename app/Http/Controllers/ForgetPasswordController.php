<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use DB;
// use Mail; 
use Illuminate\Support\Str;
use Carbon\Carbon; 
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class ForgetPasswordController extends Controller
{
    public function index()
    {
        return view('Auth.forgetPassword');
    }

    public function forgetPasswordRequest (Request $request) {

        $request->validate([
            'email' => 'required|unique:password_reset_tokens|email|exists:users',
        ],[
            'exists' => 'Input the Email Correctly',
            'confirmed' => 'Different Password Confirmation',
            'unique' => 'You Have requested a new password before, Please check your email account!'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.emailContent', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('success', 'Check your account Email!');

    }

    public function indexResetPasswordForm($token) { 
        return view('Auth.recoverPassword', [
            'token' => $token,
            "title" => "Forget Password"
        ]);
    }

    public function resetPasswordForm(Request $request)

    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|confirmed',
        ],[
            'exists' => 'Input your Email Correctly!',
            'confirmed' => 'Password must different from Password Confirmation!'
        ]);

        $updatePassword = DB::table('password_reset_tokens')  
        ->where([  
            'email' => $request->email,  
            'token' => $request->token
        ])->first();

        if(!$updatePassword){
            return back()->with('failed', 'Input your Email Correctly!');
        }

        $user = User::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('success', 'Your Password succesfuly update. Please login again!');
    }
}
