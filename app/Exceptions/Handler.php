<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Throwable;

class Handler extends ExceptionHandler
{
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

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });
    }

    public function render($request, Throwable $exception)
    {
        // 認証エラー
        if ($exception instanceof AuthenticationException) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 401);
        }

        // バリデーションエラー
        if ($exception instanceof ValidationException) {
            return response()->json([
                'success' => false,
                'errors'  => $exception->validator->errors()->messages()
            ], 422);
        }

        // その他
        if ($exception instanceof \Exception) {
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage()
            ], 500);
        }

        return parent::render($request, $exception);
    }
}
