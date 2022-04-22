<?php

namespace App\Providers;

use App\Events\newBooking;
use App\Events\statusBooking;
use App\Listeners\changeStatusBooking;
use App\Listeners\decreaseQtyRemaining;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        newBooking::class => [
            decreaseQtyRemaining::class,
        ],
        statusBooking::class => [
            changeStatusBooking::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
