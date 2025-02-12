<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\FileTrait;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{
    use ApiResponse, FileTrait;
    public function index(ListRequest $request): JsonResponse
    {//trie pas prix, num seat
        $search = ucwords($request->input('search'), " ");
        $query = Vehicle::query()->when($request->search, function ($q) use ($search){
                $q->where('provider_name', 'like',  "%{$search}%");
            })->when($request->type_vehicle, function ($q) use ($request){
            $q->where('type', $request->type_vehicle);
        })->when($request->available, function ($q) use ($request){
            $q->where('is_available', $request->available);
        })->when($request->department, function ($q) use ($request){
            $q->where('department_id', $request->department);
        })->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('vehicle', 2)]),
            $query, VehicleResource::collection($query->items()));
    }
    public function show(vehicle $vehicle): JsonResponse
    {
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('vehicle', 1)]), $vehicle);
    }

    public function store(VehicleRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, 'image', 'public/vehicles');
        Vehicle::create($data);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('vehicle', 1)]));
    }

    public function update(VehicleRequest $request, Vehicle $vehicle): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, 'image', 'public/vehicles');
        $vehicle->update($data);
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('vehicle', 1)]));
    }

    public function destroy(Vehicle $vehicle): JsonResponse
    {
        $vehicle->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('vehicle', 1)]));
    }
}
