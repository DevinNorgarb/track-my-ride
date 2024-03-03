<?php
    namespace App\Listeners;

    use App\Events\CoordinateCreated;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Queue\InteractsWithQueue;

    class HandleCoordinateCreated implements ShouldQueue
    {
        use InteractsWithQueue;

        /**
         * Handle the event.
         *
         * @param CoordinateCreated $event
         * @return void
         */
        public function handle(CoordinateCreated $event)
        {
            // Access the coordinate from the event
            $coordinate = $event->coordinate;

            // Perform any actions you need with the newly created coordinate
            // For example, you can log the event, send notifications, etc.
            // ...

            // Note: If you're queueing this listener (implements ShouldQueue),
            // the job will be processed asynchronously.
            // Otherwise, the handle method will be executed immediately.
        }

    }
