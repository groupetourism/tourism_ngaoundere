<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Http\Traits\ApiResponse;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        $search = strtoupper($request->input('search'));
        $query = Vehicle::query()->where('name', 'like',  "%{$search}%")->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('vehicle', 2)]),
            $query->currentPage(), $query->lastPage(), VehicleResource::collection($query->items()));
    }

    public function store(VehicleRequest $request): JsonResponse
    {
        Vehicle::create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('vehicle', 1)]));
    }

    public function show(vehicle $vehicle): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('vehicle', 1)]), $vehicle->get());
    }

    public function update(VehicleRequest $request, Vehicle $vehicle): JsonResponse
    {
        $vehicle->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('vehicle', 1)]));
    }

    public function destroy(Vehicle $vehicle): JsonResponse
    {
        $vehicle->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('vehicle', 1)]));
    }
}
