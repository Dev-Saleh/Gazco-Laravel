<?php

namespace App\Listeners;

use App\Events\newBooking;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class decreaseQtyRemaining
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
    public function handle(newBooking $event)
    {
        $this->updateQtyRemaining($event->gaz_Logs);
    }
    function updateQtyRemaining($gaz_Logs)
    {
       if($gaz_Logs->qtyRemaining > '0') 
       {
            $gaz_Logs->qtyRemaining= $gaz_Logs->qtyRemaining - 1;
            $gaz_Logs->save();
       }
       elseif($gaz_Logs->qtyRemaining=='0') 
       {
            $gaz_Logs->allowBookig='0';
            $gaz_Logs->save();

       }
    }
}
