<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAccessPermissionGroupTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('access_permission_group')) {
            Schema::create('access_permission_group', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('permission_id')->index();
                $table->integer('group_id')->index();
                $table->integer('created_user_id')->index();
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
        Schema::dropIfExists('table_access_permission_group');
    }

}
