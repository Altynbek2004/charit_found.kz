<?php

namespace App\Services\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $data)
    {
        $imagePath = null;
        if (isset($data['image'])) {
            $imagePath = $data['image']->store('profileImages', 'public');
        }

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image' => $imagePath,
        ]);

        return $user;
    }
}
