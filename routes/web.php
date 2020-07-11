<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::resource('parkingSpace', 'ParkingSpaceController');

Route::resource('settings', 'SettingsController');
Route::post('settings/updateTimes', 'SettingsController@updateTimes')->name('settings.updateTimes');
Route::post('settings/updateParkingtime', 'SettingsController@updateParkingtime')->name('settings.updateParkingtime');
