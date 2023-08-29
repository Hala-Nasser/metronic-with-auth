<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('home');
        }
        return response()->view('auth.login');

    }

    public function login(LoginRequest $request){
        $loggedIn = Auth::guard('admin')->attempt($request->loginInfo());
        if($loggedIn){
            return response()->json(['message'=>"تمت العملية بنجاح"], Response::HTTP_OK);
        }
        return response()->json(['message'=>"البريد الالكتروني او كلمة المرور غير صحيحة"], Response::HTTP_UNAUTHORIZED);
    }
}
