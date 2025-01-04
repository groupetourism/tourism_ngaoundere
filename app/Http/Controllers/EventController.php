<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\FileTrait;
use App\Models\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use ApiResponse, FileTrait;
    public function index(ListRequest $request): JsonResponse
    {//trie pas prix
        $search = ucwords($request->input('search'), " ");
        $query = Event::query()->when($request->search, function ($q) use ($search){
            $q->where('name', 'like',  "%{$search}%");
        })->when($request->site, function ($q) use ($request){
            $q->where('site_id', $request->site);
        })->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('event', 2)]),
            $query, EventResource::collection($query->items()));
    }

    public function show(Event $event): JsonResponse
    {
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('event', 1)]), $event);
    }

    public function store(EventRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, 'image', 'public/events');
        Event::create($data);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('event', 1)]));
    }

    public function update(EventRequest $request, Event $event): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, 'image', 'public/events');
        $event->update($data);
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('event', 1)]));
    }

    public function destroy(Event $event): JsonResponse
    {
        $event->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('event', 1)]));
    }
}
