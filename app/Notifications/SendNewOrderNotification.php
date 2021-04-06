<?php

namespace App\Notifications;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Queue\InteractsWithQueue;

class SendNewOrderNotification
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
     * @param  NewOrderNotification  $event
     * @return void
     */
    public function handle( $event)
    {
        //Notification::send(NewOrderNotification($event->order));
    }
}
