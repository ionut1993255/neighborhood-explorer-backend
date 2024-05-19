<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    // Register a user
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{7,}$/'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        if ($user) {
            return response()->json([
                'message' => 'User registered successfully!',
                'user' => $user
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Something went wrong!'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    // Log in a user
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->messages()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials! Please try again or register an account!'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user = Auth::user();

        if ($user instanceof User) {
            $token = $user->createToken('token')->plainTextToken;
            $cookie = cookie('jwt', $token, 60 * 24); // 1 day

            return response()->json([
                'message' => 'User logged in successfully!',
                'user' => $user,
                'token' => $token
            ], Response::HTTP_OK)->withCookie($cookie);
        }

        return response()->json([
            'message' => 'Something went wrong!'
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    // Show the authenticated user
    public function user()
    {
        return Auth::user();
    }

    // Log out a user
    public function logout()
    {
        $cookie = Cookie::forget('jwt');

        return response()->json([
            'message' => 'User is logged out successfully!'
        ], Response::HTTP_OK)->withCookie($cookie);
    }
}
