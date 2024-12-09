<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Http\Traits\ApiResponse;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        $search = strtoupper($request->input('search'));
        $query = Event::query()->where('name', 'like',  "%{$search}%")->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('event', 2)]),
            $query->currentPage(), $query->lastPage(), EventResource::collection($query->items()));
    }

    public function store(EventRequest $request): JsonResponse
    {
        $event = $request->validated();
        $event['event_picture'] = $this->updateUserFile($request, 'event_picture', 'public/event_pictures');
        Event::create($event);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('event', 1)]));
    }

    public function show(Event $event): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('event', 1)]), $event->get());
    }

    public function update(EventRequest $request, Event $event): JsonResponse
    {
        $event->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('event', 1)]));
    }

    public function destroy(Event $event): JsonResponse
    {
        $event->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('event', 1)]));
    }
}
