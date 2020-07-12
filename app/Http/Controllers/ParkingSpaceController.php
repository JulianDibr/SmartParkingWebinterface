<?php

namespace App\Http\Controllers;

use App\ParkingSpace;
use App\User;
use Carbon\Carbon;
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
        $openingTimes = User::find(1)->parkingTimes; //Get open hours
        $days = $openingTimes->days; //Get open days
        $now = Carbon::now(); //Current date

        $dayOpen = $days->pluck('day')->contains($now->dayOfWeek); //Current day in open days
        $hoursOpen = $now->format('H:i:s') >= $openingTimes->open_time && $now->format('H:i:s') <= $openingTimes->close_time; //Current time between open hours

        if ($dayOpen && $hoursOpen) {
            $spaces = ParkingSpace::select('device_id', 'status')->get();
            return [
                'opened' => true,
                'spaces' => $spaces
                ];
        } else {
            return ['opened' => false];
        }
    }
}
