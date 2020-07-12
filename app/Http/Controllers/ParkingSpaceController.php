<?php

namespace App\Http\Controllers;

use App\ParkingSpace;
use App\User;
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
        dd($parkingSpace);
    }

    public function updateStatus(Request $request) {
        $parkingSpace = ParkingSpace::where('device_id', $request->device_id)->get()->first();
        if ($parkingSpace->currentParkdauer() > Auth::user()->settings->max_parkingtime) {
            $parkingSpace->setStatusAttribute(2);
        } else {
            $parkingSpace->setStatusAttribute($request->status);
        }
        $parkingSpace->update();

        return $parkingSpace->status;
    }

    public function getAllStatus() {
        $openingTimes = User::find(1)->parkingTimes;

        //TODO if current Time between $openingTimes and on selected dates => by status else all false

        if (true) {
            $spaces = ParkingSpace::select('device_id', 'status')->get();
            dd($spaces);
            return [
                'opened' => true,

                ];
        } else {
            return ['opened' => false];
        }
    }
}
