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
        $search = strtoupper($request->input('search'));
        $query = Tour::query()->where('name', 'like',  "%{$search}%")->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('tour', 2)]),
            $query->currentPage(), $query->lastPage(), TourResource::collection($query->items()));
    }

    public function store(TourRequest $request): JsonResponse
    {
        $tour = $request->validated();
        $tour['tour_picture'] = $this->updateUserFile($request, 'tour_picture', 'public/tour_pictures');
        Tour::create($tour);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('tour', 1)]));
    }

    public function show(Tour $tour): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('tour', 1)]), $tour->get());
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
