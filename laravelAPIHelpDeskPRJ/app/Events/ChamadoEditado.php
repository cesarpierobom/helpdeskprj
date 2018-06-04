<?php

namespace App\Events;

use App\Models\Chamado;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChamadoEditado
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chamado;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Chamado $chamadoEditado)
    {
        $this->chamado = $chamadoEditado;
    }
}
