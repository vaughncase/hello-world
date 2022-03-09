<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessRolesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('access_roles')) {
            Schema::create('access_roles', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('moet_unit_id')->default(0)->index()->comment('Đơn vị được định nghĩa trong bảng moet_units');
                $table->string('name');
                $table->string('code')->comment("Mã code chức vụ");
                $table->integer('created_user_id')->index();
                $table->integer('modified_user_id')->nullable();
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
        Schema::dropIfExists('access_roles');
    }

}
