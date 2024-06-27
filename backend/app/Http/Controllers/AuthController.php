<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:255',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login success',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
    public function logout()
    {
        $user = Auth::user();
        try {
            $user->currentAccessToken()->delete();
            return response()->json(['success' => true,'message'=>'You have been logged out'],200);
        }catch (\Exception $exception){
            return response()->json(['success' => false,'message'=>$exception->getMessage()],400);
        }
    }

    public function register(Request $request)
    {
        $data=$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|string'
        ]);
        try {
            if($data['user_type']=='hospital'){
                $user=User::create($data);
                $user->assignRole('hospital');
            }else{
                $user=User::create($data);
                $user->assignRole('user');
            }
            return response()->json(['success' => true,'message'=>'You have been registered'],201);
        }catch (\Exception $exception){
            return response()->json(['success' => false,'message'=>$exception->getMessage()],400);
        }
    }

    public function index(Request $request)
    {
        $user = $request->user();
        $permissions = $user->getAllPermissions();
        $roles = $user->getRoleNames();
        return response()->json([
            'message' => 'Login success',
            'data' => $user,
            'permissions' => $permissions,
            'roles' => $roles
        ]);
    }
}
