<?php
// app/Http/Controllers/RideCoordinatesController.php

    namespace App\Http\Controllers;

    use App\Models\Ride;
    use Illuminate\Http\Request;
    use App\Events\CoordinateCreated;

    class RideCoordinatesController extends Controller
    {
        public function store(Request $request,$rideId)
        {
            $ride = Ride::findOrFail($rideId);

            $this->validate($request,[
                'latitude'  => 'required',
                'longitude' => 'required',
            ]);

            $coordinate = $ride->coordinates()->create($request->all());

            event(new CoordinateCreated($coordinate));

            return response()->json($coordinate,201);
        }

    }
