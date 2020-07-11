<?php

namespace App\Http\Controllers;

use App\settings;

class SettingsController extends Controller {
    public function index() {
        return view('settings');
    }

    public function updateParkingtime(settings $settings) {

    }

    public function updateTimes(settings $settings) {

    }
}
