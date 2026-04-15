<?php

namespace App\Services;

use App\Models\Student;

class StudentService
{
    public function all()
    {
        return Student::all();
    }

    public function register($data)
    {
        return Student::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'] ?? 'student'
        ]);
    }
}
