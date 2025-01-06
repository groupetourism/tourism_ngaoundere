<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListRequest;
use App\Http\Requests\ReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Http\Traits\ApiResponse;
use App\Models\Accommodation;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\Vehicle;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    use ApiResponse;
    public function index(ListRequest $request): JsonResponse
    {
        if (!auth()->user()->is_admin){
            if (!empty($request->user) && (int) $request->user !== auth()->id())
                return $this->respondForbidden('vous n\'avez pas le role et les permissions requise pour accéder a la resource');
            $query = auth()->user()->reservations()->when($request->status, function ($q) use ($request){
                $q->where('status', $request->status);
            })->when($request->user, function ($q) use ($request){
                $q->where('user_id', $request->user);
            })->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));
        }else{
            $query = Reservation::query()->when($request->status, function ($q) use ($request){
                $q->where('status', $request->status);
            })->when($request->user, function ($q) use ($request){
                $q->where('user_id', $request->user);
            })->orderBy('start_date')->paginate(config('constants.PAGINATION_LIMIT'));
        }
        return $this->respondSuccessWithPaginate(__('list of :title retrieved successfully', ['title'=>trans_choice('reservation', 2)]),
            $query, ReservationResource::collection($query->items()));
    }

    public function show(Reservation $reservation): JsonResponse
    {
        if (!auth()->user()->is_admin && $reservation->user_id !== auth()->id())
            return $this->respondForbidden('vous n\'avez pas le role et les permissions requise pour accéder a la resource');
        return $this->respondWithSuccess(__(':title retrieved successfully', ['title'=>trans_choice('reservation', 1)]), $reservation);
    }

    public function store(ReservationRequest $request): JsonResponse
    {
        //take request validated, verify if reservabletype(vehicle), reservabletype(accommodation) of type 2,  reservabletype(room) is available
        // calculate total_price based on reservabletype(vehicle) price_per_hour, reservabletype(room) price_per_night
        //then store. state become 1 and is_available become 0
        //normaly reservation and when end date arrive so is_available become 1 and state become 0 (expiré)
        $data = $request->validated();
        $startDate = Carbon::parse($request->start_date, config('constants.TIME_ZONE'))->startOfDay();
        $endDate = Carbon::parse($request->end_date, config('constants.TIME_ZONE'));
//        DB::transaction(function () use ($request, $data, $startDate, $endDate) {
            if ($request->reservable_type === 'App\Models\Room') {
                $room = Room::findOrFail($request->reservable_id);
                if (!$room->is_available) {
                    return $this->respondError('chambre indisponible');
                }
                $numberOfNights = $endDate->diffInDays($startDate);
                $data['total_price'] = $room->price_per_night * $numberOfNights;
                $room->is_available = false;
                $room->save();
            }
            if ($request->reservable_type === 'App\Models\Vehicle') {
                $vehicle = Vehicle::findOrFail($request->reservable_id);
                if (!$vehicle->is_available) {
                    return $this->respondError('Vehicule indisponible');
                }
//                $from = Carbon::parse($request->start_date, config('constants.TIME_ZONE'));
//                $to = Carbon::parse($request->end_date, config('constants.TIME_ZONE'));
                $numberOfHours = $endDate->diffInHours($startDate);
                $data['total_price'] = $vehicle->price_per_hour * $numberOfHours;
                $vehicle->is_available = false;
                $vehicle->save();
            }
            auth()->user()->reservations()->create($data);
//        });

        return $this->respondWithSuccess(__(':title added successfully', ['title'=>trans_choice('reservation', 1)]));
    }

    public function destroy(Reservation $reservation): JsonResponse
    {
        //verify the reservation is active then change to -1 then make the reservable available
        if ($reservation->status !== 1)
            return $this->respondError("On n'annule que les reservations active");
        DB::transaction(function () use ($reservation) {
            $reservation->status = -1;
            $reservation->save();
            if ($reservation->reservable_type === 'App\Models\Room') {
                $room = Room::find($reservation->reservable_id);
                $room->is_available = false;
                $room->save();
            }
            if ($reservation->reservable_type === 'App\Models\Vehicle') {
                $vehicle = Vehicle::findOrFail($reservation->reservable_id);
                $vehicle->is_available = false;
                $vehicle->save();
            }
        });
        return $this->respondWithSuccess(__(':title cancelled successfully', ['title'=>trans_choice('reservation', 1)]));
    }
}
