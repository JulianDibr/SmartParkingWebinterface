<?php

namespace App\Http\Controllers;

use App\settings;

class SettingsController extends Controller {
    public function index() {
        return view('settings');
    }

    public function update(settings $settings) {

    }

    public function updateTimes(settings $settings) {

    }
}
