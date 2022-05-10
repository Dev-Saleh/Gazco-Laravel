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
            $gazLogs->decrement('qtyRemaining');
            
            if($gazLogs->qtyRemaining=='0') 
            $gazLogs->update(['allowBooking'=>'0']);
       }
       
    }
}
