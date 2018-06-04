<?php

namespace App\Listeners;

use App\Events\NovaInteracao;
use App\Notifications\NovaInteracao as NovaInteracaoNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnviarNotificacaoNovaInteracao
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
     * @param  NovaInteracao  $event
     * @return void
     */
    public function handle(NovaInteracao $event)
    {
        $users = $event->interacao->chamado->watchers;
        if (count($users)>0) {
            Notification::send($users, new NovaInteracaoNotification($event->interacao));
        }
    }
}
