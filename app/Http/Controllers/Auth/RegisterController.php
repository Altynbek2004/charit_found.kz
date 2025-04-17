<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $authService;


    public function __construct(AuthService $authService){
        $this->authService = $authService;
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = $this->authService->register($request->all());

        return response()->json([
            'message' => 'Қолданушы сәтті тіркелді',
            'user' => $user
        ], 201);
    }

}
