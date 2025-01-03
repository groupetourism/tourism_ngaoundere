<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\RoomRequest;
use App\Http\Resources\RoomResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\FileTrait;
use App\Models\Room;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    use ApiResponse, FileTrait;
    public function index(ListRequest $request): JsonResponse
    {//tri par prix, capacite
        $hotel = $request->input('hotel');
        $available = $request->input('available');
        $query = Room::query()->where(['accommodation_id' => $hotel, 'is_available' => $available])->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('room', 2)]),
            $query->currentPage(), $query->lastPage(), RoomResource::collection($query->items()));
    }

    public function show(Room $room): JsonResponse
    {
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('room', 1)]), $room);
    }

    public function store(RoomRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, 'image', 'public/rooms');
        Room::create($data);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('room', 1)]));
    }

    public function update(RoomRequest $request, Room $room): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, 'image', 'public/rooms');
        $room->update($data);
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('room', 1)]));
    }

    public function destroy(Room $room): JsonResponse
    {
        $room->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('room', 1)]));
    }
}
