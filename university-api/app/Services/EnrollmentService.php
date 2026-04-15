<?php

namespace App\Services;

use App\Models\Enrollment;

class EnrollmentService
{
    public function enroll($studentId, $courseId)
    {
        return Enrollment::create([
            'student_id' => $studentId,
            'course_id' => $courseId
        ]);
    }
}
