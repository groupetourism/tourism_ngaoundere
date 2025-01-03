<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Http\Traits\ApiResponse;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        $status = $request->input('status');
        $user = $request->input('user');
        if (!auth()->user()->is_admin)
            if ($user !== auth()->id())
                return $this->respondForbidden('vous n\'avez pas le role et les permissions requise pour accéder a la resource');
            $query = auth()->user()->reservations->where(['status' => $status, 'user_id' => $user])->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));
        $query = Reservation::query()->where(['status' => $status, 'user_id' => $user])->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));

        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('reservation', 2)]),
            $query->currentPage(), $query->lastPage(), ReservationResource::collection($query->items()));
    }

    public function show(Reservation $reservation): JsonResponse
    {
        if (!auth()->user()->is_admin && $reservation->user_id !== auth()->id())
            return $this->respondForbidden('vous n\'avez pas le role et les permissions requise pour accéder a la resource');
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('reservation', 1)]), $reservation);
    }

    public function store(ReservationRequest $request): JsonResponse
    {
        Reservation::create($request->validated());
        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('reservation', 1)]));
    }

    public function update(ReservationRequest $request, Reservation $reservation): JsonResponse
    {
        $reservation->update($request->validated());
        return $this->respondWithSuccess(__(':title updated successfully', ['title'=>trans_choice('reservation', 1)]));
    }

    public function destroy(Reservation $reservation): JsonResponse
    {
        $reservation->delete();
        return $this->respondWithSuccess(__(':title deleted successfully', ['title'=>trans_choice('reservation', 1)]));
    }
}
