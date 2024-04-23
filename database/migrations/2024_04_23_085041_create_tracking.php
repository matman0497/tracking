<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTracking extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('request_time');
            $table->ipAddress('ip_address');
            $table->string('location', 255)->nullable();
            $table->string('os', 255);
            $table->string('device', 255);
            $table->string('referer', 255)->nullable();
            $table->string('url', 255);
            $table->string('language', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trackings');
    }
}
