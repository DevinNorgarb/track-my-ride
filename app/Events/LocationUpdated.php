<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use phpDocumentor\Reflection\Location;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 *
 */
class LocationUpdated implements ShouldBroadcast
{
    use Dispatchable;
    use SerializesModels;
    use InteractsWithSockets;

    public Location $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function broadcastOn()
    {
        return new PrivateChannel('location.' . $this->location->user_id);
    }

}

