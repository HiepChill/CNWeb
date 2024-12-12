<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItCentersHardwareDevicesTables extends Migration
{
    public function up()
    {
        Schema::create('it_centers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('location');
            $table->string('contact_email');
            $table->timestamps();
        });

        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_name');
            $table->string('type');
            $table->boolean('status')->default(true);
            $table->foreignId('center_id')->constrained('it_centers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hardware_devices');
        Schema::dropIfExists('it_centers');
    }
}
