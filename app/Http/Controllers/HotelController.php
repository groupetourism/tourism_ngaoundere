<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\HotelRequest;
use App\Http\Resources\HotelResource;
use App\Http\Traits\ApiResponse;
use App\Models\Accommodation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        $search = strtoupper($request->input('search'));
        $query = Accommodation::query()->where('name', 'like',  "%{$search}%")->orderBy('name')->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('hotel', 2)]),
            $query->currentPage(), $query->lastPage(), HotelResource::collection($query->items()));
    }

    public function store(HotelRequest $request): JsonResponse
    {
        Accommodation::create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('hotel', 1)]));
    }

    public function show(Accommodation $hotel): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('hotel', 1)]), $hotel->get());
    }

    public function update(HotelRequest $request, Accommodation $hotel): JsonResponse
    {
        $hotel->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('hotel', 1)]));
    }

    public function destroy(Accommodation $hotel): JsonResponse
    {
        $hotel->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('hotel', 1)]));
    }
}
