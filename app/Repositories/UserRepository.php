<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function createUser($data)
    {
        return User::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'school_number' => $data['school'],
            'class_name' => $data['class_name'] ?? null,
            'is_teacher' => $data['is_teacher'] ?? 0,
            'region_id' => $data['region_id'],
            'district_id' => $data['district_id'],
            'quarter_id' => $data['quarter_id'],
        ]);
    }

    public function authenticateUser($email, $password)
    {
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($password, $user->password)) {
            return $user;
        }

        return null;
    }

    public function getUser($email){
        return User::where('email', $email)->first();
    }

    public function getUserById($id){
        return User::where('id', $id)->first();
    }

    public function users(){
        return User::paginate(100);
    }
}
