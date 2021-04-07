<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function register(Request $request) {
        $this -> validate($request, [
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8'
        ]);
        $userData = [
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'level' => 'admin',
            'api_token' => '',
            'status' => 1
        ];

        $user = User::create($userData);
        return response()->json($user, Response::HTTP_OK);
    }

    public function login(Request $request) {
        $email = $request->input('email');
        $user = User::where('email',$email)->first();
        // Check Password
        if (Hash::check($request->input('password'), $user->password)) {
            $token = Str::random(40);
            $user->update([
                'api_token' => $token
            ]);
            $data = [
                'status' => 200,
                'msg'    => "Login Success",
                'api_token'  => $token,
            ];
            return response()->json($data, Response::HTTP_OK);
        }
        $data = [
            'status' => 400,
            'msg'    => "Wrong Username Or Password",
        ];
        return response()->json($data, Response::HTTP_UNAUTHORIZED);
    }
}
