<?php
    namespace App\Http\Controllers;

    use App\Events\CoordinateCreated;
    use App\Models\Ride;
    use Illuminate\Http\Request;

    class RideCoordinatesController extends Controller
    {
        public function store(Request $request,$rideId)
        {
            // Find the ride associated with the provided rideId
            $ride = Ride::findOrFail($rideId);

            // Validate incoming coordinates
            $this->validate($request,[
                'latitude'  => 'required',
                'longitude' => 'required',
                // Add any other validation rules as needed
            ]);

            // Create a new coordinate record for the ride
            $coordinate = $ride->coordinates()->create($request->all());

            // Dispatch an event when a new coordinate is created
            event(new CoordinateCreated($coordinate));

            return response()->json($coordinate,201);
        }

        // Other methods as needed
    }

    `
