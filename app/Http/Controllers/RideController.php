<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *
 */
class RideController extends Controller
{
    public function store(Request $request)
    {
        $ride = auth()->user()->rides()->create($request->all());

        return response()->json($ride,201);
    }
}
