<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'message' => 'Unauthenticated'
            ], 401);
        }

        // assuming you have "role" column in students table
        if ($user->role !== $role) {
            return response()->json([
                'message' => 'Unauthorized - Insufficient role'
            ], 403);
        }

        return $next($request);
    }
}
