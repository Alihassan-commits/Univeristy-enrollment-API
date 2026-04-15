<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\StudentService;
use App\Services\CourseService;
use App\Services\EnrollmentService;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // 🔥 Service Container Bindings

        $this->app->singleton(StudentService::class);
        $this->app->singleton(CourseService::class);
        $this->app->singleton(EnrollmentService::class);
    }

    public function boot(): void
    {
        //
    }
}
