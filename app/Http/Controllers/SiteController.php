<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Http\Traits\ApiResponse;
use App\Http\Traits\FileTrait;
use App\Models\Site;
use Illuminate\Http\JsonResponse;

class SiteController extends Controller
{
    use ApiResponse, FileTrait;
    public function index(ListRequest $request): JsonResponse
    {//trie pas jour ouvert, prix
        $search = ucwords($request->input('search'), " ");
        $query = Site::query()->with('department')->when($request->search, function ($q) use ($search){
            $q->where('name', 'like',  "%{$search}%");
        })->when($request->department, function ($q) use ($request){
            $q->where('department_id', $request->department);
        })->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('site', 2)]),
        $query, SiteResource::collection($query->items()));
    }

    public function show(Site $site): JsonResponse
    {
        $site->load('department')->get();
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('site', 1)]), $site);
    }

    public function store(SiteRequest $request): JsonResponse
    {
        $data = $request->validated();
//        $data['opening_hours'] = json_encode($request->opening_hours);
        $data['image'] = $this->uploadFile($request, 'image', 'public/sites');
        Site::create($data);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('site', 1)]));
    }

    public function update(SiteRequest $request, Site $site): JsonResponse
    {
        $data = $request->validated();
        $data['image'] = $this->uploadFile($request, 'image', 'public/sites');
        $site->update($data);
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('site', 1)]));
    }

    public function destroy(Site $site): JsonResponse
    {
        $site->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('site', 1)]));
    }
}
