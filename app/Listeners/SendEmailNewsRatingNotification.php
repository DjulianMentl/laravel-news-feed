<?php

namespace App\Listeners;

use App\Events\CounterIncrement;
use App\Jobs\SendEmails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Cookie;

class SendEmailNewsRatingNotification
{
    public const COOKIE_DURATION = 30;

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
     * @param  \App\Events\CounterIncrement  $event
     * @return void
     */
    public function handle(CounterIncrement $event)
    {
        Cookie::queue('counter_' . $event->news->id, true, self::COOKIE_DURATION);

        $event->news->counter++;

        if (($event->news->counter % 10) == 0) {
            SendEmails::dispatch($event->news)->afterResponse()->afterCommit()->onQueue('emails');
        }

        $event->news->save();
    }
}
