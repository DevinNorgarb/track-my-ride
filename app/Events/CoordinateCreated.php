<?php
// app/Events/CoordinateCreated.php

    namespace App\Events;

    use App\Models\Coordinate;
    use Illuminate\Broadcasting\InteractsWithSockets;
    use Illuminate\Foundation\Events\Dispatchable;
    use Illuminate\Queue\SerializesModels;

    class CoordinateCreated
    {
        use Dispatchable,InteractsWithSockets,SerializesModels;

        public $coordinate;

        public function __construct(Coordinate $coordinate)
        {
            $this->coordinate = $coordinate;
        }

    }
