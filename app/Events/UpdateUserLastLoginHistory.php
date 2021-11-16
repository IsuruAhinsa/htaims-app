<?php

namespace App\Events;

use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserLastLoginHistory
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        try {
            $user = $event->user;
            $user->last_login = Carbon::now();
            $user->last_login_ip = request()->getClientIp();
            $user->save();
        } catch (\Throwable $throwable) {
            report($throwable);
        }
    }
}
