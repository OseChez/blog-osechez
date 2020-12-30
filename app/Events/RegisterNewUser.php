<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\PreRegister;

class RegisterNewUser
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $preregister;
    public $hash;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PreRegister $preregister,$hash)
    {
       $this->preregister = $preregister;
       $this->hash = $hash;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
