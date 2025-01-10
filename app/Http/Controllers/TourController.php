<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\TourRequest;
use App\Http\Resources\TourResource;
use App\Http\Traits\ApiResponse;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class TourController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        if (!auth()->user()->is_admin){
            if (!empty($request->user) && (int) $request->user !== auth()->id())
                return $this->respondForbidden('vous n\'avez pas le role et les permissions requise pour accéder a la resource');
            $query = auth()->user()->tours()->with(['site', 'user'])->when($request->user, function ($q) use ($request){
                $q->where('user_id', $request->user);
            })->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));
        }else{
            $query = Tour::query()->with(['site', 'user'])->when($request->user, function ($q) use ($request){
                $q->where('user_id', $request->user);
            })->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));
        }
            return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('tour', 2)]),
                $query, TourResource::collection($query->items()));
    }
    public function show(Tour $tour_plan): JsonResponse
    {
        if (!auth()->user()->is_admin && $tour_plan->user_id !== auth()->id())
            return $this->respondForbidden('vous n\'avez pas le role et les permissions requise pour accéder a la resource');
        $tour_plan->load('user', 'site')->get();
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('tour', 1)]), $tour_plan);
    }

    public function store(TourRequest $request): JsonResponse
    {// for start and enddate, time is not a most so use $start = Carbon::parse($request->from, config('constants.TIME_ZONE'))->startOfDay() //endOfDay samefor events
        auth()->user()->tours()->create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('tour', 1)]));
    }

    public function update(TourRequest $request, Tour $tour_plan): JsonResponse
    {
        $tour_plan->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('tour', 1)]));
    }

    public function destroy(Tour $tour_plan): JsonResponse
    {
        $tour_plan->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('tour', 1)]));
    }
}
