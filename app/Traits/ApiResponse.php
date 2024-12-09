<?php


namespace App\Http\Traits;


use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\JsonResponse;
use JsonSerializable;
use Symfony\Component\HttpFoundation\Response;

trait ApiResponse
{
    /**
     * Return a standardized JSON response.
     *
     * @param int $statusCode
     * @param string $statusMessage
     * @param int $currentPage
     * @param int $lastPage
     * @param mixed $data
     * @return JsonResponse
     */
    public function respondSuccessWithPaginate(string $statusMessage, int $currentPage, int $lastPage, mixed $data, int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'status_code' => $statusCode,
            'status_message' => $statusMessage,
            'current_page' => $currentPage,
            'last_page' => $lastPage,
            'data' => $data,
        ]);
    }

    public function respondWithSuccess(string $message, mixed $contents = null, int $status=Response::HTTP_OK): JsonResponse
    {
        $contents = $this->morphToArray($contents) ?? [];

        $data = [];
        $data['status_code'] = $status;
        $data['status_message'] = $message;
        $data['data'] = $contents;

        return $this->apiResponse($data);
    }

    public function respondAuthenticated($message = null, $contents = null, $token = null, $status=Response::HTTP_OK): JsonResponse
    {
        $data = [];
        $data['status_code'] = $status;
        $data['status_message'] = $message;
        $data['user_id'] = $contents;
        $data['token'] = $token;

        return $this->apiResponse($data);
    }

    public function respondForbidden(string $message = null, $contents = null, $status=Response::HTTP_FORBIDDEN): JsonResponse
    {
        $data = [];
        $data['status_code'] = $status;
        $data['status_message'] = $message;
        $data['data'] = $contents;

        return $this->apiResponse($data);
    }

    public function respondFailedValidation(mixed $errors = null, string $message = 'erreur de validation', int $status=Response::HTTP_UNPROCESSABLE_ENTITY): JsonResponse {
        $data = [];
        $data['status_code'] = $status;
        $data['status_message'] = $message;
        $data['errors'] = $errors;
        return $this->apiResponse($data);
    }

    public function respondError(string $message = null, int $status=Response::HTTP_BAD_REQUEST): JsonResponse {
        $data = [];
        $data['status_code'] = $status;
        $data['status_message'] = $message;
        return $this->apiResponse($data);
    }

    private function apiResponse(array $data): JsonResponse
    {
        $code = $data['status_code'];
        return response()->json($data, $code);
    }

    private function morphToArray($data)
    {
        if ($data instanceof Arrayable) {
            return $data->toArray();
        }
        if ($data instanceof JsonSerializable) {
            return $data->jsonSerialize();
        }
        return $data;
    }
}
