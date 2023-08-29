<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ResetPasswordController extends Controller
{
    public function showForgotPassword(){
        if (Auth::guard('admin')->check()) {
            return redirect('home');
        }
        return response()->view('auth.forgot_password');
    }


    public function forgotPassword(ForgotPasswordRequest $request){
        $email= $request->email();
        if($email){
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token,
                'created_at' => Carbon::now()
              ]);

              Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            return response()->json(['message'=>"تم ارسال رابط اعادة تعيين كلمة المرور الى الايميل"], Response::HTTP_OK);
        }

    }

    public function showResetPassword(){
        if (Auth::guard('admin')->check()) {
            return redirect('home');
        }
        return response()->view('auth.forgot_password');
    }
}
