<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelResource;
use App\Http\Traits\ApiResponse;
use App\Models\Hotel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        $search = strtoupper($request->input('search'));
        $query = Hotel::query()->where('name', 'like',  "%{$search}%")->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('hotel', 2)]),
            $query->currentPage(), $query->lastPage(), HotelResource::collection($query->items()));
    }

    public function store(HotelRequest $request): JsonResponse
    {
        Hotel::create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('hotel', 1)]));
    }

    public function show(Hotel $hotel): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('hotel', 1)]), $hotel->get());
    }

    public function update(HotelRequest $request, Hotel $hotel): JsonResponse
    {
        $hotel->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('hotel', 1)]));
    }

    public function destroy(Hotel $hotel): JsonResponse
    {
        $hotel->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('hotel', 1)]));
    }
}
