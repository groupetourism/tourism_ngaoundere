<?php

namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

trait FileTrait
{
    public function uploadFile(Request $request, string $fileField, string $storagePath)
    {
        if ($request->hasFile($fileField)) {
            $filePath = $request->$fileField->store($storagePath);
            return Storage::disk('public')->url(str_replace('public/', '', $storagePath) . '/' . basename($filePath));
        }
    }
}
