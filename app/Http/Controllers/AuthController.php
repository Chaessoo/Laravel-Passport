<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;

        return response()->json([ 'user' => $user, 'token' => $token],200);

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details.
            Please try again']);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response()->json(['user' => auth()->user(), 'token' => $token],200);

    }


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(["status" => "Logged Out"],200);
    }

    public function home()
    {
        return response()->json(["message"=>"HOME"],200);
    }

    public function admin()
    {
        return response()->json([
            "message" => "admin"
        ]);
    }
}
