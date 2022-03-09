<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_devices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('device_id');
            $table->tinyInteger('device_type')->comment('0:iOs; 1:Android');
            $table->tinyInteger('app_type')->nullable()->comment('0: App HS; 1: App PH');
            $table->tinyInteger('status')->default(1)->comment('0:disable;1:active');
            $table->string('app_version')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_devices');
    }
}
