<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\AuthCheck;



return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Middleware global (jika dibutuhkan)
        // $middleware->append(SomeGlobalMiddleware::class);

        // ✅ Daftarkan middleware route
        $middleware->alias([
            'authcheck' =>AuthCheck::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Daftar exception handler jika dibutuhkan
    })
    ->create();