<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class SuccessfulLogin
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
        $date = \Carbon\Carbon::now();

        DB::table('log_users_login')
        ->insert([
            'user_id' => $event->user->id,
            'fecha_inicio_sesion' => $date->toDateString(),
            'hora_conexion' => $date->toTimeString()
        ]);
    }
}
