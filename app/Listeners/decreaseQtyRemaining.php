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
        $this->updateQtyRemaining($event->gazLogs);
    }
    function updateQtyRemaining($gazLogs)
    {
       if($gazLogs->qtyRemaining > '0') 
       {
            $gazLogs->qtyRemaining= $gazLogs->qtyRemaining - 1;
            $gazLogs->save();
       }
       elseif($gazLogs->qtyRemaining=='0') 
       {
            $gazLogs->allowBooking='0';
            $gazLogs->save();

       }
    }
}
