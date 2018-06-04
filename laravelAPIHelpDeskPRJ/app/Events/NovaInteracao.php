<?php

namespace App\Events;

use App\Models\Interacao;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NovaInteracao
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $interacao;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Interacao $novaInteracao)
    {
        $this->interacao = $novaInteracao;
    }
}
