<?php

namespace App\Http\Controllers;

use App\ParkingSpace;
use App\settings;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParkingSpaceController extends Controller {
    public function store(Request $request) {
        //Speichern eines neuen Parkplatz
        $data = $request->all();
        $data['user_id'] = Auth::id();
        ParkingSpace::create($data);

        return redirect()->route('home');
    }

    public function destroy(ParkingSpace $parkingSpace) {
        //Entfernen eines Parkplatz
        $parkingSpace->delete();
        return redirect()->route('home');
    }

    public function updateStatus(Request $request) {
        $parkingSpace = ParkingSpace::where('device_id', $request->device_id)->get()->first(); //Parkplatz mit der device_id aus der request laden

        if ($parkingSpace->currentParkdauer() > Settings::find(1)->getMaxParkingtimeinMin()) { //Wenn Parkdauer überschritten setze Status auf 2 (orange)
            $parkingSpace->setStatusAttribute(2);
        } else {
            if ($parkingSpace->status !== $request->status) { //Nur wenn sich der Status geändert hat => updated_at Zeit wird sonst verändert
                $parkingSpace->setStatusAttribute($request->status); //Setze Status auf den aus der request
            }
        }
        $parkingSpace->update(); //Schreibe neue Daten in DB

        return $parkingSpace->status; //Rückgabe des neuen Status
    }

    public function getAllStatus() {
        $openingTimes = User::find(1)->parkingTimes; //Get: Öffnungszeiten
        $days = $openingTimes->days; //Get: Offene Tage
        $now = Carbon::now(); //Aktuelles Datum

        $dayOpen = $days->pluck('day')->contains($now->dayOfWeek); //Liegt der aktuelle Wochentag in den Öffnungstagen
        $hoursOpen = $now->format('H:i:s') >= $openingTimes->open_time && $now->format('H:i:s') <= $openingTimes->close_time; //Liegt die aktuelle Uhrzeit zwischen den Öffnungszeiten

        if ($dayOpen && $hoursOpen) { //Wenn innerhalb der Öffnungszeiten
            $spaces = ParkingSpace::select('device_id', 'status')->get(); //Get: Alle Parkplätze mit device_id und ihrem status
            return [
                'opened' => "true",
                'spaces' => $spaces
            ]; //return an API
        } else {
            return ['opened' => "false"]; //return wenn außerhalb der Öffnungszeiten
        }
    }
}
