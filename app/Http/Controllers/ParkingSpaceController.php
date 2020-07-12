<?php

namespace App\Http\Controllers;

use App\ParkingSpace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParkingSpaceController extends Controller {
    public function store(Request $request) {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        ParkingSpace::create($data);

        return redirect()->route('home');
    }

    public function edit(ParkingSpace $parkingSpace) {
        //
    }

    public function update(Request $request, ParkingSpace $parkingSpace) {

    }

    public function destroy(ParkingSpace $parkingSpace) {
        //
    }

    public function updateStatus(Request $request) {
        $parkingSpace = ParkingSpace::where('device_id', $request->device_id)->get()->first();
        $parkingSpace->setStatusAttribute($request->status);
        $parkingSpace->update();

        return $parkingSpace->status;
    }
}
