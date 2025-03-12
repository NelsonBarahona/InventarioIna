<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    /**
     * Render the exception into an HTTP response.
     */
    public function render($request, Throwable $exception)
    {
        // Si la excepción es de tipo "Página no encontrada" (404)
        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
            // Redirige a tu vista personalizada de 404
            return response()->view('errors.404', [], 404);
        }

        // De lo contrario, devuelve el comportamiento por defecto
        return parent::render($request, $exception);
    }

    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
