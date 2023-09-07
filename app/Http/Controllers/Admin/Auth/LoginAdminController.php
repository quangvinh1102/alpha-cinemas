<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function login(Request $request)
    {
        try {

            $credentials = request(['email', 'password']);

            if (Auth::guard('admin')->attempt($credentials, true)) {
                /** @var \App\Models\Admin $admin **/
                $admin = Auth::guard('admin')->user();
                $tokenResult = $admin->createToken('adminToken', ['admin'])->plainTextToken;
                return response()->json([
                    'status_code' => 200,
                    'access_token' => $tokenResult,
                    'token_type' => 'Bearer',
                ]);
            }
            return response()->json([
                'status_code' => 500,
                'message' => 'Tài khoản không tồn tại'
            ]);

        } catch (\Exception $error) {
            return response()->json([
                'status_code' => 500,
                'message' => 'Tài khoản không tồn tại',
                'error' => $error,
            ]);
        }
    }
}