<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(function (Request $request) {
            return $request->is('api/*');
        });

        $exceptions->render(function (\Symfony\Component\HttpKernel\Exception\NotFoundHttpException $e, Request $request) {
            $cause = $e->getPrevious();

            if (! $cause instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                return null; // not a model miss — let Laravel render it normally
            }

            $modelName = class_basename($cause->getModel());

            $message = $request->isMethod('delete')
                ? "{$modelName} deleted already"
                : "{$modelName} not found";

            return response()->json([
                'status'  => 'error',
                'message' => $message,
                'data'    => null,
            ], 404);
        });
    })->create();
