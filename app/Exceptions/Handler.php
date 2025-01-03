<?php

namespace App\Exceptions;

use App\Http\Traits\ApiResponse;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    use ApiResponse;
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->is('api/*')) {
            return $this->handleApiException($exception);
        }
        return parent::render($request, $exception);
    }

    private function handleApiException(Throwable $exception): JsonResponse
    {
        return match (true) {
            $exception instanceof ValidationException => $this->respondFailedValidation($exception->errors()),
//            $exception instanceof AuthenticationException => $this->logAndRespond($exception, 'vous n\'etes pas authentifié', Response::HTTP_UNAUTHORIZED),
//            $exception instanceof ModelNotFoundException => $this->logAndRespond($exception, 'l\'élément demandé est introuvable', Response::HTTP_NOT_FOUND),
//            $exception instanceof MethodNotAllowedHttpException => $this->logAndRespond($exception, 'cette méthode n\'est pas autorisée', Response::HTTP_FORBIDDEN),
//            $exception instanceof NotFoundHttpException => $this->logAndRespond($exception, 'ressource non trouvée', Response::HTTP_NOT_FOUND),
//            $exception instanceof HttpExceptionInterface => $this->logAndRespond($exception, null, $exception->getStatusCode()),
//            $exception instanceof QueryException => $this->logAndRespond($exception, "une erreur de requête est survenue"),
//            $exception instanceof HttpException => $this->logAndRespond($exception, "erreur http"),
//            $exception instanceof HttpResponseException => $this->logAndRespond($exception, "erreur de réponse http", $exception->getStatusCode()),
//            default => $this->logAndRespond($exception, "erreur de serveur interne", Response::HTTP_INTERNAL_SERVER_ERROR),
            default => $this->respondError($exception, 500),
        };
    }

    private function logAndRespond(Throwable $exception, string|null $message, int $statusCode=Response::HTTP_BAD_REQUEST): JsonResponse
    {
        Log::withContext(['user_id' => auth()->id(), 'request_url' => request()->url()])->error('Exception:', [
            'errors' => $exception->getMessage(),
            'error_class' => get_class($exception),
        ]);
        return $this->respondError($message, $statusCode);
    }
}
