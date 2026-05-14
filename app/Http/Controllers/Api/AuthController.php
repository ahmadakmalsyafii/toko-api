<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'data' => $validator->errors()
            ], 400);
        }

        $member = Member::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'code' => 201,
            'status' => true,
            'data' => $member
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'data' => $validator->errors()
            ], 400);
        }

        $member = Member::where('email', $request->email)->first();

        if (!$member || !Hash::check($request->password, $member->password)) {
            return response()->json([
                'code' => 401,
                'status' => false,
                'data' => 'Unauthorized. Email atau password salah.'
            ], 401);
        }

        $token = $member->createToken('auth_token')->plainTextToken;

        return response()->json([
            'code' => 200,
            'status' => true,
            'data' => [
                'member' => $member,
                'token' => $token
            ]
        ], 200);
    }
}
