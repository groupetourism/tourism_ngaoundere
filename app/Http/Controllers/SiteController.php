<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\SiteRequest;
use App\Http\Resources\SiteResource;
use App\Http\Traits\ApiResponse;
use App\Models\Site;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {//trie pas jour ouvert
        $search = strtoupper($request->input('search'));
        $query = Site::query()->where('name', 'like',  "%{$search}%")->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('site', 2)]),
            $query->currentPage(), $query->lastPage(), SiteResource::collection($query->items()));
    }

    public function store(SiteRequest $request): JsonResponse
    {
        $site = $request->validated();
        $site['site_picture'] = $this->updateUserFile($request, 'site_picture', 'public/site_pictures');
        Site::create($site);
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('site', 1)]));
    }

    public function show(Site $site): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('site', 1)]), $site->get());
    }

    public function update(SiteRequest $request, Site $site): JsonResponse
    {
        $site->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('site', 1)]));
    }

    public function destroy(Site $site): JsonResponse
    {
        $site->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('site', 1)]));
    }
}
