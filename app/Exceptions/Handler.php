<?php
#https://laracasts.com/discuss/channels/code-review/best-way-to-handle-rest-api-errors-throwed-from-controller-or-exception
namespace App\Exceptions;

use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        // if(!$request->expectsJson())
        // return parent::render($request, $e);

        switch(true) {
            case $e instanceof ModelNotFoundException:
                return response()->json([
                    'message' => 'Record not found',
                ], 404);
            break;
            case $e instanceof NotFoundHttpException:
                return response()->json([
                    'message' => 'Page not found',
                ], 404);
            break;
            default:
                $return = [
                    "error" => [
                        "errors" => [
                            "file" => $e->getFile(),
                            "line" => $e->getLine(),
                            "exception" => (new \ReflectionClass($e))->getShortName(),
                        ],
                        "code" => $e->getCode(),
                        "message" => $e->getMessage()
                    ]
                ];

                return response()->json($return, 404);
            break;
        }
    }

}
