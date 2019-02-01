<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\AccessLog;

class LogFailedLogin
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
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        if (isset($event->user->id)) {
            AccessLog::create([
                'user_id' => $event->user->id,
                'user_name' => $event->user->username,
                'user_ip' => request()->getClientIp(),
                'event' => 'failed_login',
            ]);
        } else {
            AccessLog::create([
                'user_name' => $event->credentials['username'],
                'user_ip' => request()->getClientIp(),
                'event' => 'failed_login',
            ]);
        }
    }
}
