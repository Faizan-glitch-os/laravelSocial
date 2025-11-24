<?php

namespace App\Listeners;

use App\Events\AuthEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(AuthEvent $event): void
    {
        Log::debug("{$event->username} {$event->action}");
    }
}
