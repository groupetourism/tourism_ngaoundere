<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Http\Traits\ApiResponse;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use ApiResponse;
    public  function login(LoginRequest $request): JsonResponse
    {
        if (!Auth::attempt($request->only(['phone', 'password']))){
            return $this->respondForbidden(__('Incorrect credentials, login failed'));
        }
        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;
        return $this->respondAuthenticated(__('successfully login'), $user->id, $token);
    }
    function logout(User $user): JsonResponse
    {
        Auth::logout();
        return $this->respondWithSuccess("successfully logout");
    }
    public function index(ListRequest $request): JsonResponse
    {
        $search = strtoupper($request->input('search'));
        $query = User::query()->where('name', 'like',  "%{$search}%")->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('user', 2)]),
            $query->currentPage(), $query->lastPage(), UserResource::collection($query->items()));
    }

    public function store(UserRequest $request): JsonResponse
    {
        User::create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('user', 1)]));
    }

    public function show(User $user): JsonResponse
    {
        return $this->respondWithSuccess(__('list of :title retrieved successfully', ['title'=>trans_choice('user', 1)]), $user->get());
    }

    public function update(UserRequest $request, User $user): JsonResponse
    {
        $user->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('user', 1)]));
    }

    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('user', 1)]));
    }
}
