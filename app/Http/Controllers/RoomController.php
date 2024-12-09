<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomResource;
use App\Http\Traits\ApiResponse;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        $search = strtoupper($request->input('search'));
        $query = Room::query()->where('name', 'like',  "%{$search}%")->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('room', 2)]),
            $query->currentPage(), $query->lastPage(), RoomResource::collection($query->items()));
    }

    public function store(RoomRequest $request): JsonResponse
    {
        Room::create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('room', 1)]));
    }

    public function show(Room $room): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('room', 1)]), $room->get());
    }

    public function update(RoomRequest $request, Room $room): JsonResponse
    {
        $room->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('room', 1)]));
    }

    public function destroy(Room $room): JsonResponse
    {
        $room->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('room', 1)]));
    }
}
