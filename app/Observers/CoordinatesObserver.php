<?php

namespace App\Observers;

use App\Coordinates;
use App\Events\CoordinatesCreated;

class CoordinatesObserver
{
    /**
     * Handle the coordinates "created" event.
     *
     * @param  \App\Coordinates  $coordinates
     * @return void
     */
    public function created(Coordinates $coordinates)
    {
        broadcast(new CoordinatesCreated(['data' => $coordinates->only('longitude', 'latitude', 'created_at')]));
    }

    /**
     * Handle the coordinates "updated" event.
     *
     * @param  \App\Coordinates  $coordinates
     * @return void
     */
    public function updated(Coordinates $coordinates)
    {
        //
    }

    /**
     * Handle the coordinates "deleted" event.
     *
     * @param  \App\Coordinates  $coordinates
     * @return void
     */
    public function deleted(Coordinates $coordinates)
    {
        //
    }

    /**
     * Handle the coordinates "restored" event.
     *
     * @param  \App\Coordinates  $coordinates
     * @return void
     */
    public function restored(Coordinates $coordinates)
    {
        //
    }

    /**
     * Handle the coordinates "force deleted" event.
     *
     * @param  \App\Coordinates  $coordinates
     * @return void
     */
    public function forceDeleted(Coordinates $coordinates)
    {
        //
    }
}
