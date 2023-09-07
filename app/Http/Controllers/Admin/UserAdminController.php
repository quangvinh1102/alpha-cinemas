<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Http\Services\FileService;
use App\Models\Admin;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserAdminController extends Controller
{

    protected $file;
    public function __construct(FileService $file)
    {
        $this->file = $file;
    }

    public function getAdmin(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $admin =  $request->user();
            $admin->avatar = asset(Storage::url($admin->avatar));
            return response()->json([
                'status_code' => 200,
                'admin' => $admin,
            ]);
        }
        return response()->json([
            'status_code' => 500,
            'message' => $request,
        ]);
    }

    public function logoutAdmin(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $admin =  $request->user();
            $admin->tokens()->delete();
            Auth::guard('admin')->logout();

            return response()->json([
                'status_code' => 200,
                'message' => 'Đã đăng xuất',
            ]);
        }
        return response()->json([
            'status_code' => 500,
            'message' => 'Lỗi',
        ]);
    }

    public function indexAdmin()
    {
        $admin = Admin::get();
        foreach ($admin as $item) {
            $item['avatar'] = asset(Storage::url($item->avatar));
        }
        return response()->json($admin);
    }
    public function getAdminById($id)
    {
        $admin = Admin::find($id);

        return response()->json($admin);
    }
    public function updateAdmin(Request $request, $id)
    {
        // $user = Admin::find($id);
        // if ($request->hasFile('avatar')) {
        //     $path = $this->file->uploadImage($request->avatar, 'avatar');
        // }
        dd($request);
        // $user->update([
        //     "fullname" => $request->fullname,
        //     "avatar" => $path,
        //     "email" => $request->email,
        //     "phone" => $request->phone,
        //     "gender" => $request->gender,
        //     "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
        // ]);
        // if ($request["change_password"] == "true") {
        //     $user->update([
        //         "password" => bcrypt($request->password),
        //     ]);
        // }
    }

    public function storeAdmin(RegisterAdminRequest $request)
    {
        if ($request->hasFile('avatar')) {
            $path = $this->file->uploadImage($request->avatar, 'avatar');
        }
        try {
            $create = Admin::create([
                "fullname" => $request->fullname,
                "avatar" => $path,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "phone" => $request->phone,
                "gender" => $request->gender,
                "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
            ]);
            return response()->json(['mess' => 'Thêm tài khoản thành công!!']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    public function indexUser()
    {
        $user = User::all();
        return response()->json($user);
    }

    public function getUserById($id)
    {
        $user = User::find($id);

        return response()->json($user);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->hasFile('avatar')) {
            $path = $this->file->uploadImage($request->avatar, 'avatar');
        }
        $user->update([
            "fullname" => $request->fullname,
            "avatar" => $path,
            "email" => $request->email,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "birthday" => Carbon::parse($request->birthday)->format('Y/m/d'),
        ]);
        if ($request["change_password"] == "true") {
            $user->update([
                "password" => bcrypt($request->password),
            ]);
        }
    }

   
}
