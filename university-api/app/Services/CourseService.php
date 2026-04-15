<?php

namespace App\Services;

use App\Models\Course;

class CourseService
{
    public function all()
    {
        return Course::all();
    }

    public function create(array $data)
    {
        return Course::create($data);
    }
}
