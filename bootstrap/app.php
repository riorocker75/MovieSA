<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Exceptions\InvalidOrderException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'adminLogin' => \App\Http\Middleware\CheckAdminLogin::class,
            'userLogin' => \App\Http\Middleware\CheckUserLogin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
       
    })->create();
