<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{


    // التسجيل

    public function register(Request $request)
{
    // التحقق من صحة البيانات
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6|confirmed',
    ]);

    // إنشاء المستخدم الجديد
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // إنشاء الرمز
    $token = $user->createToken('Bearer Token')->plainTextToken;

    return response()->json([
        'status' => 'success',
        'user' => $user,
        'token' => $token,
    ], 201);
}


    // تسجيل الدخول
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        // تأكيد المستخدم
        if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'Accidentally User Is Not Found'
            ], 404);
        }

        // تأكيد كلمة المرور
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Password Is Not Actually Match'
            ], 404);
        }

        // إنشاء الرمز
        $token = $user->createToken('Bearer Token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function me(Request $request)
{
    $user = $request->user(); // الحصول على المستخدم المسجل حالياً

    return response()->json([
        'status' => 'success',
        'user' => $user,
    ]);
}



    // تسجيل الخروج
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Logout Successfully'
        ]);
    }
}