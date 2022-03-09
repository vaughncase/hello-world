<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('username')->unique();
                $table->string('sis_id')->nullable();
                $table->string('code')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('first_name');
                $table->string('middle_name')->nullable();
                $table->string('last_name');
                $table->tinyInteger('gender')->comment('1 - male; 2 - female; 3 - other')->default(3);
                $table->date('date_of_birth')->nullable();
                $table->string('password');
                $table->string('avatar')->nullable();
                $table->tinyInteger('is_active')->comment('1 - yes; 0 - no')->default(0);
                $table->tinyInteger('status')->comment('1 - open; 0 - lock')->default(1);
                $table->softDeletes();
                $table->rememberToken();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
