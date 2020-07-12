<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingSpacesTable extends Migration {
    public function up() {
        Schema::create('parking_spaces', function (Blueprint $table) {
            $table->id();
            $table->string('device_id')->unique();
            $table->string('name');
            $table->string('group');
            $table->integer('status')->default(0); //0=no => Not Occupied; 1=yes => Occupied
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down() {
        Schema::dropIfExists('parking_spaces');
    }
}
