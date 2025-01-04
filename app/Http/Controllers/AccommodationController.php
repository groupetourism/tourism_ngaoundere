<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccommodationRequest;
use App\Http\Requests\ListRequest;
use App\Http\Resources\AccommodationResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\FileTrait;
use App\Models\Accommodation;
use Illuminate\Http\JsonResponse;

class AccommodationController extends Controller
{
    use ApiResponse, FileTrait;
    public function index(ListRequest $request): JsonResponse
    {//trie par prix, balcon num room si residence, stars, parking si hotel et resid. orderby exclud null
        $search = ucwords($request->input('search'), " ");
        $query = Accommodation::query()->when($request->search, function ($q) use ($search){
            $q->where('name', 'like',  "%{$search}%");
        })->when($request->type_accommodation, function ($q) use ($request){
            $q->where('type', $request->type_accommodation);
        })->orderBy('number_of_stars', 'desc')->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('accommodation', 2)]),
            $query, AccommodationResource::collection($query->items()));
    }

    public function show(Accommodation $accommodation): JsonResponse
    {
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('accommodation', 1)]), $accommodation);
    }

    public function store(AccommodationRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, "image", "public/accommodations");
        Accommodation::create($data);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('accommodation', 1)]));
    }

    public function update(AccommodationRequest $request, Accommodation $accommodation): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, "image", "public/accommodations");
        $accommodation->update($data);
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('accommodation', 1)]));
    }

    public function destroy(Accommodation $accommodation): JsonResponse
    {
        $accommodation->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('accommodation', 1)]));
    }
}
