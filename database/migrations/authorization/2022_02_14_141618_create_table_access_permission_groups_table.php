<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableAccessPermissionGroupsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('access_permission_groups')) {
            Schema::create('access_permission_groups', function(Blueprint $table) {
                $table->increments('id');
                $table->integer('moet_unit_id')->nullable()->comment('Mã đơn vị');
                $table->string('name');
                $table->string('code')->unique()->nullable();
                $table->text('description')->nullable();
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
    public
    function down()
    {
        Schema::dropIfExists('table_access_permission_groups');
    }

}
