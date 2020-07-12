<?php

namespace App\Http\Controllers;

use App\settings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller {
    public function index() {
        $settings = Auth::user()->settings;
        $opening_times = Auth::user()->parkingTimes;
        return view('settings', compact('settings', 'opening_times'));
    }

    public function update(Request $request, $id) {
        $settings = settings::find($id);
        $settings->update($request->all());

        return redirect()->route('settings.index');
    }

    public function updateTimes(Request $request) {
        $parkingTimes = Auth::user()->parkingTimes;
        $parkingTimes->update($request->all());

        $parkingTimes->days()->detach();
        foreach ($request->days as $day) {
            $parkingTimes->days()->attach($day);
        }

        return redirect()->route('settings.index');
    }

    public function getSettings() {
        $settings = User::find(1)->settings;

        return [
            'max_parkingtime' => $settings->max_parkingtime,
            'meassure_distance' => $settings->meassure_distance,
        ];
    }
}
