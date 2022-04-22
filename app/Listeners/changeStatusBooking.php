<?php

namespace App\Listeners;

use App\Events\newBooking;
use App\Events\statusBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class changeStatusBooking
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(statusBooking $event)
    {
        $this->changeStatusBooking($event->logBookings);
    }
    function changeStatusBooking($logBookings)
    {
        $logBookings->status_booking= $logBookings->status_booking=='0' ? '1':'0';
        $logBookings->save();
       
    }
}
