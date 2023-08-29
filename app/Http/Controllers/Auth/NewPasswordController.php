<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewPasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;


class NewPasswordController extends Controller
{
    public function showNewPassword()
    {
        return response()->view('auth.new_password');
    }

    public function newPassword(NewPasswordRequest $request)
    {
        $data = $request->getData();
        if ($data) {
            if (Hash::check($request->password, Auth::guard('admin')->user()->password)) {
                Admin::whereId(Auth::guard('admin')->user()->id)->update([
                    'password' => Hash::make($request->new_password)
                ]);
                return response()->json(['message' => "تم تغيير كلمة المرور بنجاح"], Response::HTTP_OK);
            }
            return response()->json(['message' => "كلمة المرور القديمة غير صحيحة"], Response::HTTP_UNAUTHORIZED);
        }
    }
}
