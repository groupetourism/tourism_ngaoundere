<?php

namespace App\Http\Traits;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

trait UserTrait
{
    public function uploadFile(Request $request, string $fileField, string $storagePath)
    {
        if ($request->hasFile($fileField)) {
            $filePath = $request->$fileField->store($storagePath);
            return Storage::disk('public')->url($storagePath . '/' . basename($filePath));
        }
    }

    public function updateUserFile(Request $request, string $fileField, string $storagePath, string $successMessage): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            $fileField => 'required|file|mimes:pdf,jpg,png',
        ]);
        if ($validator->fails()) {
            return $this->respondFailedValidation($validator->errors());
        }
        $user = auth()->user();
        $data = [];

        if ($request->hasFile($fileField)) {
            $filePath = $request->$fileField->store($storagePath);
            $data[$fileField] = Storage::disk('public')->url($storagePath . '/' . basename($filePath));
        }
        $user->update($data);
        return $this->respondWithSuccess($successMessage);
    }
}
