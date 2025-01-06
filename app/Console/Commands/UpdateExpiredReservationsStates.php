<?php

namespace App\Console\Commands;

use App\Models\Accommodation;
use App\Models\Room;
use App\Models\Vehicle;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class UpdateExpiredReservationsStates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservations:update-expired-states';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Met à jour l'état des reservations expirés et rends les models reservable à nouveau disponible";

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now();
        $expiredReservations = Reservation::where('end_date', '<', $today)->where('status', 1)->get();

        foreach ($expiredReservations as $reservation) {
            DB::transaction(function () use ($reservation) {
                $reservation->status = 0; // Mark as expired
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
        }
        $this->info('Etats des reservations Mis à jour.');
    }
}
