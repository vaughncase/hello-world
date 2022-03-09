<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessRoleUserTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('access_role_user')) {
            Schema::create('access_role_user', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('moet_unit_id')->index()->comment('Đơn vị được định nghĩa trong bảng moet_units');
                $table->integer('role_id')->index();
                $table->integer('user_id')->index();
                $table->integer('created_user_id')->index()->nullable();
                $table->integer('modified_user_id')->index()->nullable();
                $table->softDeletes();
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
        Schema::dropIfExists('access_role_user');
    }

}
