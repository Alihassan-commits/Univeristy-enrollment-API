<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "University Enrollment API",
    description: "University Management System (Laravel + Passport + Swagger + Role Middleware)"
)]
#[OA\Server(
    url: "http://127.0.0.1:8000",
    description: "Local Development Server"
)]
#[OA\SecurityScheme(
    securityScheme: "bearerAuth",
    type: "http",
    scheme: "bearer",
    bearerFormat: "Passport Access Token"
)]
#[OA\Tag(
    name: "Auth",
    description: "Authentication APIs (Login/Register)"
)]
#[OA\Tag(
    name: "Students",
    description: "Student Management APIs"
)]
#[OA\Tag(
    name: "Courses",
    description: "Course Management APIs"
)]
#[OA\Tag(
    name: "Enrollment",
    description: "Student Course Enrollment APIs"
)]
class OpenApiSpec
{
    // This class is only used for Swagger metadata
}
