<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    public function showRegister()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('home');
        }
        return response()->view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $admin = Admin::create($request->getData());
        if ($admin) {
            Auth::guard('admin')->login($admin);
            return response()->json(['message' => "تمت العملية بنجاح"], Response::HTTP_OK);
        }
    }
}
