<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function enroll(Request $request)
    {
        return Enrollment::create([
            'student_id' => $request->student_id,
            'course_id' => $request->course_id
        ]);
    }
}
