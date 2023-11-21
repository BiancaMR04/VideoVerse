<?php

namespace App\Events;

use App\Models\Seguidor;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class NewFollowerEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $inscricao;

    /**
     * Create a new event instance.
     */
    public function __construct(Seguidor $inscricao)
    {
        $this->inscricao = $inscricao;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
