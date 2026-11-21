<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\ClientMiddleware;
use App\Http\Middleware\HandleInertiaRequests;
use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            HandleInertiaRequests::class,
        ]);
        $middleware->alias([
            'super_admin' => SuperAdminMiddleware::class,
            'admin' => AdminMiddleware::class,
            'client' => ClientMiddleware::class,
        ]);
        $middleware->validateCsrfTokens(except:[
            'flw-webhook',
            'invoices/preview',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->respond(function (\Symfony\Component\HttpFoundation\Response $response, \Throwable $e, \Illuminate\Http\Request $request) {
            if ($response->getStatusCode() === 419) {
                // For traditional browser forms, preserve user input and redirect back with friendly alert
                if (!$request->header('X-Inertia') && !$request->expectsJson()) {
                    return redirect()->back()
                        ->withInput($request->except(['password', 'password_confirmation', '_token']))
                        ->with('warning', 'Your session expired for security. Please submit again.');
                }
            }
            return $response;
        });
    })->create();
