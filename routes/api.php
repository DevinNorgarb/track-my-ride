<?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    /*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "api" middleware group. Make something great!
    |
    */

    Route::middleware('auth:sanctum')->get('/user',function (Request $request) {
        return $request->user();
    });

    Route::post('/rides','RideController@store');

// routes/web.php or routes/api.php

    use App\Http\Controllers\RideCoordinatesController;

    Route::post('/rides/{rideId}/coordinates',[RideCoordinatesController::class,'store']);
