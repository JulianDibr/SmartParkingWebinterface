<?php

namespace App\Http\Controllers;

use App\ParkingSpace;
use Illuminate\Http\Request;

class ParkingSpaceController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        ParkingSpace::create($request->all());

        return redirect()->route('home');
    }

    public function show(ParkingSpace $parkingSpace)
    {
        //
    }

    public function edit(ParkingSpace $parkingSpace)
    {
        //
    }

    public function update(Request $request, ParkingSpace $parkingSpace)
    {

    }

    public function destroy(ParkingSpace $parkingSpace)
    {
        //
    }

    public function updateStatus(Request $request)
    {
        $parkingSpace = ParkingSpace::where('device_id', $request->device_id)->get()->first();
        $parkingSpace->setStatusAttribute($request->status);
        $parkingSpace->update();

        return $parkingSpace->status;
    }
}
