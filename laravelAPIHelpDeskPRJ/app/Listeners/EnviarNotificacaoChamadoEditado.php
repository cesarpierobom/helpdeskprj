<?php

namespace App\Listeners;

use App\Events\ChamadoEditado;
use App\Notifications\ChamadoEditado as ChamadoEditadoNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarNotificacaoChamadoEditado
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
     * @param  ChamadoEditado  $event
     * @return void
     */
    public function handle(ChamadoEditado $event)
    {
        $users = $event->chamado->watchers;
        if (count($users)>0) {
            Notification::send($users, new ChamadoEditadoNotification($event->chamado));
        }
    }
}
