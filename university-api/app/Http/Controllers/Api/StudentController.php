<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class StudentController extends Controller
{
    /**
     * GET ALL STUDENTS
     */
    #[OA\Get(
        path: "/api/students",
        summary: "Get all students",
        tags: ["Students"],
        responses: [
            new OA\Response(
                response: 200,
                description: "List of students",
                content: new OA\JsonContent(
                    type: "array",
                    items: new OA\Items(
                        type: "object",
                        properties: [
                            new OA\Property(property: "id", type: "integer", example: 1),
                            new OA\Property(property: "name", type: "string", example: "Ali"),
                            new OA\Property(property: "email", type: "string", example: "ali@gmail.com"),
                            new OA\Property(property: "role", type: "string", example: "student"),
                            new OA\Property(property: "created_at", type: "string", example: "2026-01-01T10:00:00.000000Z")
                        ]
                    )
                )
            ),
            new OA\Response(
                response: 500,
                description: "Server Error"
            )
        ]
    )]
    public function index()
    {
        return response()->json(Student::all());
    }

    /**
     * CREATE STUDENT
     */
    #[OA\Post(
        path: "/api/students",
        summary: "Create new student",
        tags: ["Students"],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "email", "password"],
                properties: [
                    new OA\Property(property: "name", type: "string", example: "Ali"),
                    new OA\Property(property: "email", type: "string", example: "ali@gmail.com"),
                    new OA\Property(property: "password", type: "string", example: "123456"),
                    new OA\Property(property: "role", type: "string", example: "student")
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 201,
                description: "Student created successfully"
            ),
            new OA\Response(
                response: 422,
                description: "Validation error"
            )
        ]
    )]
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required|min:6'
        ]);

        $student = Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role ?? 'student'
        ]);

        return response()->json($student, 201);
    }

    /**
     * GET SINGLE STUDENT
     */
    #[OA\Get(
        path: "/api/students/{id}",
        summary: "Get student by ID",
        tags: ["Students"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer", example: 1)
            )
        ],
        responses: [
            new OA\Response(
                response: 200,
                description: "Student found"
            ),
            new OA\Response(
                response: 404,
                description: "Student not found"
            )
        ]
    )]
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json($student);
    }
}
