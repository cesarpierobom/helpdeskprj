<?php

namespace App\Listeners;

use App\Events\ChamadoEditado;
use App\Notifications\ChamadoEditado as ChamadoEditadoNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

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
        $watchers = $event->chamado->watchers;
        $analista = $event->chamado->analista;
        $responsavel = $event->chamado->responsavel;
        $autor = $event->chamado->autor;

        if (count(array_merge($watchers, $analista, $responsavel, $autor))>0) {
            Notifications::send($users, new ChamadoEditadoNotification($event->chamado));
        }
    }
}
