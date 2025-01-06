<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccommodationRequest;
use App\Http\Requests\ListRequest;
use App\Http\Resources\AccommodationResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\FileTrait;
use App\Models\Accommodation;
use Faker\Provider\File;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        })->when($request->department, function ($q) use ($request){
            $q->where('department_id', $request->department);
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
        if (!empty($data['image'])){
            $data['image'] = $this->determineUploadFolder($data, $request);
        }
        Accommodation::create($data);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('accommodation', 1)]));
    }

    public function update(AccommodationRequest $request, Accommodation $accommodation): JsonResponse
    {
        $data = $request->validated();
        if (!empty($data['image'])){
            $data['image'] = $this->determineUploadFolder($data, $request);
        }
        $accommodation->update($data);
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('accommodation', 1)]));
    }

    public function destroy(Accommodation $accommodation): JsonResponse
    {
        $accommodation->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('accommodation', 1)]));
    }
    private function determineUploadFolder(array $data, AccommodationRequest $request){
        switch ($data['type']) {
            case config('constants.HOTEL'):
                $data['image'] = $this->uploadFile($request, "image", "public/hotels"); break;
            case config('constants.RESTAURANT'):
                $data['image'] = $this->uploadFile($request, "image", "public/restaurants"); break;
            case config('constants.LEISURE'):
                $data['image'] = $this->uploadFile($request, "image", "public/leisures"); break;
            case config('constants.HOSPITAL'):
                $data['image'] = $this->uploadFile($request, "image", "public/hospitals"); break;
            case config('constants.TRAVEL_AGENCIES'):
                $data['image'] = $this->uploadFile($request, "image", "public/travel_agencies"); break;
            case config('constants.HOSTEL'):
                $data['image'] = $this->uploadFile($request, "image", "public/auberges"); break;
        }
        return $data['image'];
    }
}
