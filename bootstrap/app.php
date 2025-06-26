<?php
// bootstrap/app.php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        // Tambahkan 'then' closure untuk mendaftarkan rute tambahan
        then: function () {
            Route::middleware('web')
                ->prefix('admin') // Semua rute di admin.php akan diawali dengan /admin
                ->name('admin.')   // Semua nama rute akan diawali dengan admin.
                ->group(base_path('routes/admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Pastikan middleware alias Anda sudah terdaftar di sini
        $middleware->alias([
            'auth.admin' => \App\Http\Middleware\AuthenticateAdmin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
