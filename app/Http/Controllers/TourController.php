<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\TourRequest;
use App\Http\Resources\TourResource;
use App\Http\Traits\ApiResponse;
use App\Models\Tour;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TourController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
//        $user = auth()->id();->where('user_id', $user)
        $query = Tour::query()->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('tour', 2)]),
            $query->currentPage(), $query->lastPage(), TourResource::collection($query->items()));
    }

    public function show(Tour $tour): JsonResponse
    {
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('tour', 1)]), $tour);
    }

    public function store(TourRequest $request): JsonResponse
    {
        Tour::create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('tour', 1)]));
    }

    public function update(TourRequest $request, Tour $tour): JsonResponse
    {
        $tour->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('tour', 1)]));
    }

    public function destroy(Tour $tour): JsonResponse
    {
        $tour->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('tour', 1)]));
    }
}
